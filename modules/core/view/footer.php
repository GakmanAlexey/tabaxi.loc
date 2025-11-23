
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
    // Конфигурация
    const config = {
        minWidth: 400,           // Минимальная ширина экрана
        maxWidth: 5000,          // Максимальная ширина экрана  
        baseWidth: 1200,         // Базовая ширина контента
        scaleCorrection: 0.94,   // Поправка масштаба
        resizeDelay: 250,        // Задержка при ресайзе
        scaleMode: 'transform',  // 'transform' или 'zoom'
        
        // Селекторы блоков для масштабирования
        targetSelector: '.scale-container',
        
        // Селекторы блоков для исключения
        excludeSelectors: [
            '.no-scale',
            '[data-no-scale]'
        ]
    };

    class AutoScaler {
        constructor(config) {
            this.config = config;
            this.scaleRatio = 1;
            this.init();
        }

        init() {
            this.applyScaling();
            this.bindEvents();
        }

        // Получение всех блоков для масштабирования
        getTargetBlocks() {
            const blocks = document.querySelectorAll(this.config.targetSelector);
            
            return Array.from(blocks).filter(block => {
                // Проверка на исключения
                return !this.config.excludeSelectors.some(selector => 
                    block.matches(selector) || block.closest(selector)
                );
            });
        }

        // Расчет коэффициента масштабирования
        calculateScaleRatio() {
            const windowWidth = window.innerWidth;
            
            // Если ширина вне диапазона - не масштабируем
            if (windowWidth < this.config.minWidth || windowWidth > this.config.maxWidth) {
                return 1;
            }

            // Расчет масштаба
            return (windowWidth / this.config.baseWidth) * this.config.scaleCorrection;
        }

        // Применение масштабирования к блокам
        applyScaling() {
            this.scaleRatio = this.calculateScaleRatio();
            const blocks = this.getTargetBlocks();

            blocks.forEach(block => {
                if (this.config.scaleMode === 'transform') {
                    this.applyTransformScale(block);
                } else {
                    this.applyZoomScale(block);
                }
            });

            // Сохраняем коэффициент в CSS переменной
            document.documentElement.style.setProperty('--scale-ratio', this.scaleRatio);
        }

        // Масштабирование через transform
        applyTransformScale(block) {
            block.style.transform = `scale(${this.scaleRatio})`;
            block.style.transformOrigin = 'top center';
            block.style.width = `${this.config.baseWidth}px`;
            block.style.margin = '0 auto';
        }

        // Масштабирование через zoom
        applyZoomScale(block) {
            block.style.zoom = this.scaleRatio;
        }

        // Обработка событий
        bindEvents() {
            let resizeTimeout;
            
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(() => {
                    this.applyScaling();
                }, this.config.resizeDelay);
            });

            // Повторное масштабирование после загрузки шрифтов
            document.fonts?.ready?.then(() => {
                setTimeout(() => this.applyScaling(), 100);
            });

            // Масштабирование при полной загрузке DOM
            document.addEventListener('DOMContentLoaded', () => {
                this.applyScaling();
            });
        }

        // Обновление конфигурации
        updateConfig(newConfig) {
            Object.assign(this.config, newConfig);
            this.applyScaling();
        }
    }

    // Инициализация
    window.autoScaler = new AutoScaler(config);
    
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