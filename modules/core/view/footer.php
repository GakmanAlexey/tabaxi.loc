
    
    
    
    <script>
        // Простой скрипт для плавного появления элементов при скролле
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.appearance-effect');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = 1;
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });
            
            cards.forEach(card => {
                card.style.opacity = 0;
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                observer.observe(card);
            });
        });



    
(function() {
    const config = {
        minWidth: 400,
        maxWidth: 5000,
        baseWidth: 1200,
        scaleCorrection: 0.94
    };

    function applyAutoScale() {
        const windowWidth = window.innerWidth;
        let scaleRatio = 1;

        if (windowWidth >= config.minWidth && windowWidth <= config.maxWidth) {
            scaleRatio = (windowWidth / config.baseWidth) * config.scaleCorrection;
        }

        // Применяем масштабирование ко всем блокам с классом scale-container
        const blocks = document.querySelectorAll('.scale-container');
        blocks.forEach(block => {
            if (block.classList.contains('no-scale')) {
                block.style.zoom = '1';
                block.style.width = `${config.baseWidth}px`;
                block.style.margin = '0 auto';
            } else {
                block.style.zoom = scaleRatio;
                block.style.width = `${config.baseWidth}px`;
                block.style.margin = '0 auto';
            }
        });

        document.documentElement.style.setProperty('--zoom-factor', scaleRatio);
    }

    // Инициализация
    applyAutoScale();
    
    // Обработчики событий
    let resizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(applyAutoScale, 250);
    });

    document.addEventListener('DOMContentLoaded', applyAutoScale);
    window.addEventListener('load', () => setTimeout(applyAutoScale, 100));
    
})();





        const nav = document.getElementById('tutNav');
        let isCollapsed = false;
        let scrollTimeout;
        let userManuallyOpened = false; // Флаг ручного открытия

        // Проверяем мобильное устройство
        function isMobile() {
            return window.innerWidth <= 768;
        }

        // Обработчик прокрутки для автоматического сворачивания (только для десктопа)
        window.addEventListener('scroll', function() {
            if (!isMobile() && !isCollapsed && !userManuallyOpened) {
                clearTimeout(scrollTimeout);
                scrollTimeout = setTimeout(() => {
                    collapseNav();
                }, 500);
            }
        });

        // Функция сворачивания
        function collapseNav() {
            if (!isMobile()) {
                nav.classList.add('collapsed');
                isCollapsed = true;
            }
        }

        // Функция разворачивания
        function expandNav() {
            if (!isMobile()) {
                nav.classList.remove('collapsed');
                isCollapsed = false;
                userManuallyOpened = true; // Пользователь сам открыл - больше не сворачиваем
            }
        }

        // Функция переключения состояния навигации
        function toggleNav() {
            if (!isMobile()) {
                if (isCollapsed) {
                    expandNav();
                } else {
                    collapseNav();
                }
                
                // Сбрасываем таймер при ручном управлении
                clearTimeout(scrollTimeout);
            }
        }

        // Обработчик изменения размера окна
        window.addEventListener('resize', function() {
            if (isMobile()) {
                // На мобилке всегда развернутое состояние
                nav.classList.remove('collapsed');
                isCollapsed = false;
                userManuallyOpened = false;
            } else {
                // При переходе на десктоп сбрасываем флаг ручного открытия
                userManuallyOpened = false;
            }
        });

        // Инициализация при загрузке
        if (isMobile()) {
            nav.classList.remove('collapsed');
            isCollapsed = false;
            userManuallyOpened = false;
        }

        // Автоматическое сворачивание при первой загрузке (только для десктопа)
        window.addEventListener('load', function() {
            if (!isMobile()) {
                setTimeout(() => {
                    collapseNav();
                }, 1000);
            }
        });
    </script>

    <div class="tut_009_container scale-container">
        <div class="tut_009_footer">
            <div class="tut_009_logo">
                    <div class="tut_009_logo_icon">ТУТ</div>
                    <div class="tut_009_logo_text">Таверна у Табакси</div>
                </div>
            <a href="">лицензионное соглашение</a>
        </div>
    </div>