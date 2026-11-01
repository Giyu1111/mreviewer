document.addEventListener('DOMContentLoaded', () => {
    const navigationSelectors = '.navbar .nav-inner, .mr-page-navbar .mr-page-nav-inner';

    document.querySelectorAll(navigationSelectors).forEach((navigation, index) => {
        const brand = navigation.querySelector('.brand, .mr-page-brand');
        let menu = navigation.querySelector('.nav-links');

        if (!menu) {
            const navigationItems = Array.from(navigation.children).filter((element) => (
                element !== brand && (element.matches('a, button') || element.querySelector('a, button'))
            ));

            if (navigationItems.length === 0) {
                return;
            }

            menu = document.createElement('div');
            navigationItems.forEach((item) => menu.append(item));
            navigation.append(menu);
        }

        const menuId = `mr-mobile-menu-${index}`;
        const toggle = document.createElement('button');
        toggle.type = 'button';
        toggle.className = 'mr-nav-toggle';
        toggle.setAttribute('aria-controls', menuId);
        toggle.setAttribute('aria-expanded', 'false');
        toggle.setAttribute('aria-label', 'Open navigation menu');
        toggle.innerHTML = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2"></path></svg>';

        menu.id = menuId;
        menu.classList.add('mr-mobile-menu');
        navigation.classList.add('mr-menu-ready');
        navigation.insertBefore(toggle, brand || navigation.firstChild);

        const closeMenu = () => {
            menu.classList.remove('is-open');
            toggle.setAttribute('aria-expanded', 'false');
            toggle.setAttribute('aria-label', 'Open navigation menu');
        };

        toggle.addEventListener('click', () => {
            const isOpen = menu.classList.toggle('is-open');
            toggle.setAttribute('aria-expanded', String(isOpen));
            toggle.setAttribute('aria-label', isOpen ? 'Close navigation menu' : 'Open navigation menu');
        });

        menu.querySelectorAll('a, button').forEach((item) => item.addEventListener('click', closeMenu));
        document.addEventListener('click', (event) => {
            if (!navigation.contains(event.target)) {
                closeMenu();
            }
        });
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                closeMenu();
            }
        });
    });
});
