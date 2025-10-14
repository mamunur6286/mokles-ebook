export default [{
    _name: 'CSidebarNav',
    _children: [{
            _name: 'CSidebarNavItem',
            name: 'sidebar.dashboard',
            to: '/dashboard',
            icon: 'cil-speedometer',
            items: []
        },
        {
        _name: 'CSidebarNavItem',
        name: 'Authors',
        to: '/authors',
        icon: 'cil-user',
        items: []
      },
      {
        _name: 'CSidebarNavItem',
        name: 'Categories',
        to: '/categories',
        icon: 'cil-list',
        items: []
      },
      {
        _name: 'CSidebarNavItem',
        name: 'Series',
        to: '/series',
        icon: 'cil-layers',
        items: []
      },
      {
        _name: 'CSidebarNavItem',
        name: 'Books',
        to: '/books',
        icon: 'cil-list',
        items: []
      },
      {
        _name: 'CSidebarNavItem',
        name: 'Lessons',
        to: '/lessons',
        icon: 'cil-list',
        items: []
      },
      {
        _name: 'CSidebarNavItem',
        name: 'General Setting',
        to: '/settings',
        icon: 'cil-settings',
        items: []
      }
    ]
}]