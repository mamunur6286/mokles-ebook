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
            _name: 'CSidebarNavDropdown',
            name: 'Salon Management',
            route: '/salon-management',
            icon: 'cil-list',
            show: true,
            items: [
                {
                    name: '- Salon Requests',
                    to: '/salon-management/salon-requests'
                },
                {
                    name: '- Salon List',
                    to: '/salon-management/salon-list'
                },
                {
                    name: '- Salon Seats',
                    to: '/salon-management/salon-seats'
                },
            ]
        },
        {
            _name: 'CSidebarNavDropdown',
            name: 'Customer Management',
            route: '/customer-management',
            icon: 'cil-list',
            show: true,
            items: [
                {
                    name: '- Customer Request',
                    to: '/customer-management/customer-requests'
                },
                {
                    name: '- Customer List',
                    to: '/customer-management/customer-list'
                }
            ]
        },
        {
            _name: 'CSidebarNavDropdown',
            name: 'Service Management',
            route: '/service-management',
            icon: 'cil-list',
            items: [
                {
                    name: '- Service Request',
                    to: '/service-management/service-requests'
                },
                {
                    name: '- Approve Services',
                    to: '/service-management/approve-services'
                },
                {   
                    name: '- Cancel Services',
                    to: '/service-management/cancel-services'
                }
            ]
        },
        {
            _name: 'CSidebarNavDropdown',
            name: 'System Settings',
            route: '/system-settings',
            icon: 'cil-settings',
            items: [
                {
                    name: '- General Setting',
                    to: '/system-settings/general-setting'
                },
                {
                    name: '- Services',
                    to: '/system-settings/services'
                },
                {
                    name: '- Districts',
                    to: '/system-settings/districts'
                },
                {
                    name: '- Thana',
                    to: '/system-settings/thanas'
                },
                {
                    name: '- Areas',
                    to: '/system-settings/areas'
                }
            ]
        }
    ]
}]