        
         const readerThemeStorageKey = 'readerTheme';

           export function getStoredReaderTheme() {
                const storedTheme = localStorage.getItem(readerThemeStorageKey);

                return ['light', 'dark'].includes(storedTheme) ? storedTheme : 'light';
            }

           export function applyReaderTheme(theme) {
                const readerTheme = document.getElementById('material-reading-theme');
                const themeToggle = document.querySelector('[data-reader-theme-toggle]');
                // const themeLabel = document.getElementById('theme-label');

                if (!readerTheme) {
                    return;
                }

                const isDark = theme === 'dark';
                readerTheme.classList.toggle('dark', isDark);
                themeToggle?.setAttribute('aria-pressed', isDark ? 'true' : 'false');

                // if (themeLabel) {
                //     themeLabel.textContent = isDark ? 'Reader Dark' : 'Reader Light';
                // }

            }

            applyReaderTheme(getStoredReaderTheme());

           export function toggleDark() {
                const readerTheme = document.getElementById('material-reading-theme');

                if (!readerTheme) {
                    return;
                }

                const nextTheme = readerTheme.classList.contains('dark') ? 'light' : 'dark';
                localStorage.setItem(readerThemeStorageKey, nextTheme);
                applyReaderTheme(nextTheme);
            }

            window.toggleDark = toggleDark;