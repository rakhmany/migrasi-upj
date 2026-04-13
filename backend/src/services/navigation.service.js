const repo = require('../repositories/navigation.repository');

// ============================================================
// Service: Navigation menu tree builder
// Replaces PHP functions: get_top_submenu, get_top_subcareer, get_subfacilities
// ============================================================

function buildLink(item) {
  if (item.fh_strukturparenttipe === 'Parent') {
    return null; // no direct link — has children
  }
  if (item.fh_strukturtipe === 'Custom Link' && item.fh_modulefilename && item.fh_modulefilename.includes('://')) {
    return { href: item.fh_modulefilename, external: true };
  }
  if (item.fh_strukturtipe === 'Page Statis' && item.fh_pagestatisid) {
    return { href: `/static-page/${item.fh_pagestatisid}/${slug(item.fh_menu_name_en)}` };
  }
  return { href: `/menu/${item.fh_strukturid}/${slug(item.fh_menu_name_en)}` };
}

function slug(text) {
  if (!text) return '';
  return text.toLowerCase().replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-').replace(/^-|-$/g, '');
}

async function getNavigationTree() {
  const topItems = await repo.getTopMenuItems();
  const facilityCategories = await repo.getFacilityCategories();
  const vacancies = await repo.getActiveVacancies();

  const menu = [];

  for (const top of topItems) {
    const node = {
      id: top.fh_strukturid,
      label: top.fh_menu_name,
      labelEn: top.fh_menu_name_en,
      link: null,
      children: [],
    };

    // Special case: Karir
    if (top.fh_menu_name === 'Karir') {
      node.link = { href: '/career' };
      if (vacancies.length > 0) {
        node.children = buildCareerSubmenu(vacancies);
      }
      menu.push(node);
      continue;
    }

    // Special case: Kerjasama — plain link, no mega menu
    if (top.fh_menu_name === 'Kerjasama') {
      node.link = { href: `/menu/${top.fh_strukturid}/${slug(top.fh_menu_name_en)}` };
      menu.push(node);
      continue;
    }

    // Parent with sub-items
    if (top.fh_strukturparenttipe === 'Parent') {
      node.children = await buildSubmenu(top.fh_strukturid, facilityCategories);
    } else {
      node.link = buildLink(top);
    }

    menu.push(node);
  }

  return menu;
}

async function buildSubmenu(parentId, facilityCategories) {
  const items = await repo.getSubMenuItems(parentId);
  const groups = [];
  let currentGroup = null;

  for (const item of items) {
    // "Top" position starts a new column group
    if (item.fh_menu_sub_pos === 'Top' || !currentGroup) {
      currentGroup = { heading: null, items: [] };
      groups.push(currentGroup);
    }

    const link = buildLink(item);
    const children = await repo.getSubMenuItems(item.fh_strukturid);

    if (children.length > 0) {
      // This is a section heading with child items
      const subItems = children.map((c) => ({
        id: c.fh_strukturid,
        label: c.fh_menu_name,
        labelEn: c.fh_menu_name_en,
        link: buildLink(c),
      }));

      // If this is "Fasilitas", append facility categories
      if (item.fh_menu_name === 'Fasilitas' && item.fh_menu_name_en === 'Facilities') {
        for (const cat of facilityCategories) {
          subItems.push({
            id: `fac-${cat.categoryid}`,
            label: cat.categoryname,
            labelEn: cat.categoryname_en,
            link: { href: `/facilities/${cat.categoryid}/${slug(cat.categoryname_en)}` },
          });
        }
      }

      currentGroup.items.push({
        id: item.fh_strukturid,
        label: item.fh_menu_name,
        labelEn: item.fh_menu_name_en,
        link,
        children: subItems,
      });
    } else {
      currentGroup.items.push({
        id: item.fh_strukturid,
        label: item.fh_menu_name,
        labelEn: item.fh_menu_name_en,
        link,
        children: [],
      });
    }
  }

  return groups;
}

function buildCareerSubmenu(vacancies) {
  const grouped = {};
  for (const v of vacancies) {
    if (!grouped[v.jobvacancycat]) grouped[v.jobvacancycat] = [];
    grouped[v.jobvacancycat].push({
      id: v.jobvacancyid,
      label: v.jobvacancytitle,
      labelEn: v.jobvacancytitle_en,
      link: { href: `/vacancy/${v.jobvacancyid}/${slug(v.jobvacancytitle_en)}` },
    });
  }
  return Object.entries(grouped).map(([cat, items]) => ({
    heading: cat,
    items: items.map((i) => ({ ...i, children: [] })),
  }));
}

module.exports = { getNavigationTree };
