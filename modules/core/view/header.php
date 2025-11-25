<!-- Навигация -->
    <div class="tut_nav_004_container scale-container" id="tutNav">
        <!-- Десктопная навигация -->
        <div class="tut_nav_004_nav">
            <!-- Логотип -->
            <div class="tut_nav_004_logo" onclick="toggleNav()">
                <div class="tut_nav_004_logo_icon">ТУТ</div>
                <div class="tut_nav_004_logo_text">Таверна у Табакси</div>
            </div>

            <!-- Центральное меню -->
            <div class="tut_nav_004_menu">
                <a href="/" class="tut_nav_004_menu_item active">Главная</a>
                <a href="/game/" class="tut_nav_004_menu_item">Партии</a>
                <a href="/materials/" class="tut_nav_004_menu_item">Справка</a>
                <a href="/service/" class="tut_nav_004_menu_item">Сервисы</a>
            </div>

            <div class="tut_nav_004_toggle_wrap">
                <!-- Кнопка личного кабинета -->
                <a href="" class="tut_nav_004_profile">
                    <svg class="tut_nav_004_profile_icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                    </svg>
                    <span>Личный кабинет</span>
                </a>

                <!-- Стрелка для сворачивания -->
                <div class="tut_nav_004_toggle" onclick="toggleNav()">
                    <svg class="tut_nav_004_toggle_icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Мобильное меню -->
        <div class="tut_nav_004_mobile_menu">
            <a href="/" class="tut_nav_004_mobile_item active">
                <svg class="tut_nav_004_mobile_icon" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                </svg>
                <span class="tut_nav_004_mobile_label">Главная</span>
            </a>
            <a href="/game/" class="tut_nav_004_mobile_item">
                <svg class="tut_nav_004_mobile_icon" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                </svg>
                <span class="tut_nav_004_mobile_label">Партии</span>
            </a>
            <a href="/materials/" class="tut_nav_004_mobile_item">
                <svg class="tut_nav_004_mobile_icon" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
                <span class="tut_nav_004_mobile_label">Справка</span>
            </a>
            <a href="/service/" class="tut_nav_004_mobile_item">
                <svg class="tut_nav_004_mobile_icon" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                </svg>
                <span class="tut_nav_004_mobile_label">Сервисы</span>
            </a>
            <a href="/lc/" class="tut_nav_004_mobile_item">
                <svg class="tut_nav_004_mobile_icon" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                </svg>
                <span class="tut_nav_004_mobile_label">Профиль</span>
            </a>
        </div>
    </div>