<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>

*,
::before,
::after {
  box-sizing: border-box;
  /* 1 */
  border-width: 0;
  /* 2 */
  border-style: solid;
  /* 2 */
  border-color: #e5e7eb;
  /* 2 */
}

::before,
::after {
  --tw-content: '';
}

/*
1. Use a consistent sensible line-height in all browsers.
2. Prevent adjustments of font size after orientation changes in iOS.
3. Use a more readable tab size.
4. Use the user's configured `sans` font-family by default.
*/

html {
  line-height: 1.5;
  /* 1 */
  -webkit-text-size-adjust: 100%;
  /* 2 */
  -moz-tab-size: 4;
  /* 3 */
  -o-tab-size: 4;
     tab-size: 4;
  /* 3 */
  font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  /* 4 */
}

/*
1. Remove the margin in all browsers.
2. Inherit line-height from `html` so users can set them as a class directly on the `html` element.
*/

body {
  margin: 0;
  /* 1 */
  line-height: inherit;
  /* 2 */
}

/*
1. Add the correct height in Firefox.
2. Correct the inheritance of border color in Firefox. (https://bugzilla.mozilla.org/show_bug.cgi?id=190655)
3. Ensure horizontal rules are visible by default.
*/

hr {
  height: 0;
  /* 1 */
  color: inherit;
  /* 2 */
  border-top-width: 1px;
  /* 3 */
}

/*
Add the correct text decoration in Chrome, Edge, and Safari.
*/

abbr:where([title]) {
  -webkit-text-decoration: underline dotted;
          text-decoration: underline dotted;
}

/*
Remove the default font size and weight for headings.
*/

h1,
h2,
h3,
h4,
h5,
h6 {
  font-size: inherit;
  font-weight: inherit;
}

/*
Reset links to optimize for opt-in styling instead of opt-out.
*/

a {
  color: inherit;
  text-decoration: inherit;
}

/*
Add the correct font weight in Edge and Safari.
*/

b,
strong {
  font-weight: bolder;
}

/*
1. Use the user's configured `mono` font family by default.
2. Correct the odd `em` font sizing in all browsers.
*/

code,
kbd,
samp,
pre {
  font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
  /* 1 */
  font-size: 1em;
  /* 2 */
}

/*
Add the correct font size in all browsers.
*/

small {
  font-size: 80%;
}

/*
Prevent `sub` and `sup` elements from affecting the line height in all browsers.
*/

sub,
sup {
  font-size: 75%;
  line-height: 0;
  position: relative;
  vertical-align: baseline;
}

sub {
  bottom: -0.25em;
}

sup {
  top: -0.5em;
}

/*
1. Remove text indentation from table contents in Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=999088, https://bugs.webkit.org/show_bug.cgi?id=201297)
2. Correct table border color inheritance in all Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=935729, https://bugs.webkit.org/show_bug.cgi?id=195016)
3. Remove gaps between table borders by default.
*/

table {
  text-indent: 0;
  /* 1 */
  border-color: inherit;
  /* 2 */
  border-collapse: collapse;
  /* 3 */
}

/*
1. Change the font styles in all browsers.
2. Remove the margin in Firefox and Safari.
3. Remove default padding in all browsers.
*/

button,
input,
optgroup,
select,
textarea {
  font-family: inherit;
  /* 1 */
  font-size: 100%;
  /* 1 */
  line-height: inherit;
  /* 1 */
  color: inherit;
  /* 1 */
  margin: 0;
  /* 2 */
  padding: 0;
  /* 3 */
}

/*
Remove the inheritance of text transform in Edge and Firefox.
*/

button,
select {
  text-transform: none;
}

/*
1. Correct the inability to style clickable types in iOS and Safari.
2. Remove default button styles.
*/

button,
[type='button'],
[type='reset'],
[type='submit'] {
  -webkit-appearance: button;
  /* 1 */
  background-color: transparent;
  /* 2 */
  background-image: none;
  /* 2 */
}

/*
Use the modern Firefox focus style for all focusable elements.
*/

:-moz-focusring {
  outline: auto;
}

/*
Remove the additional `:invalid` styles in Firefox. (https://github.com/mozilla/gecko-dev/blob/2f9eacd9d3d995c937b4251a5557d95d494c9be1/layout/style/res/forms.css#L728-L737)
*/

:-moz-ui-invalid {
  box-shadow: none;
}

/*
Add the correct vertical alignment in Chrome and Firefox.
*/

progress {
  vertical-align: baseline;
}

/*
Correct the cursor style of increment and decrement buttons in Safari.
*/

::-webkit-inner-spin-button,
::-webkit-outer-spin-button {
  height: auto;
}

/*
1. Correct the odd appearance in Chrome and Safari.
2. Correct the outline style in Safari.
*/

[type='search'] {
  -webkit-appearance: textfield;
  /* 1 */
  outline-offset: -2px;
  /* 2 */
}

/*
Remove the inner padding in Chrome and Safari on macOS.
*/

::-webkit-search-decoration {
  -webkit-appearance: none;
}

/*
1. Correct the inability to style clickable types in iOS and Safari.
2. Change font properties to `inherit` in Safari.
*/

::-webkit-file-upload-button {
  -webkit-appearance: button;
  /* 1 */
  font: inherit;
  /* 2 */
}

/*
Add the correct display in Chrome and Safari.
*/

summary {
  display: list-item;
}

/*
Removes the default spacing and border for appropriate elements.
*/

blockquote,
dl,
dd,
h1,
h2,
h3,
h4,
h5,
h6,
hr,
figure,
p,
pre {
  margin: 0;
}

fieldset {
  margin: 0;
  padding: 0;
}

legend {
  padding: 0;
}

ol,
ul,
menu {
  list-style: none;
  margin: 0;
  padding: 0;
}

/*
Prevent resizing textareas horizontally by default.
*/

textarea {
  resize: vertical;
}

/*
1. Reset the default placeholder opacity in Firefox. (https://github.com/tailwindlabs/tailwindcss/issues/3300)
2. Set the default placeholder color to the user's configured gray 400 color.
*/

input::-moz-placeholder, textarea::-moz-placeholder {
  opacity: 1;
  /* 1 */
  color: #9ca3af;
  /* 2 */
}

input:-ms-input-placeholder, textarea:-ms-input-placeholder {
  opacity: 1;
  /* 1 */
  color: #9ca3af;
  /* 2 */
}

input::placeholder,
textarea::placeholder {
  opacity: 1;
  /* 1 */
  color: #9ca3af;
  /* 2 */
}

/*
Set the default cursor for buttons.
*/

button,
[role="button"] {
  cursor: pointer;
}

/*
Make sure disabled buttons don't get the pointer cursor.
*/

:disabled {
  cursor: default;
}

/*
1. Make replaced elements `display: block` by default. (https://github.com/mozdevs/cssremedy/issues/14)
2. Add `vertical-align: middle` to align replaced elements more sensibly by default. (https://github.com/jensimmons/cssremedy/issues/14#issuecomment-634934210)
   This can trigger a poorly considered lint error in some tools but is included by design.
*/

img,
svg,
video,
canvas,
audio,
iframe,
embed,
object {
  display: block;
  /* 1 */
  vertical-align: middle;
  /* 2 */
}

/*
Constrain images and videos to the parent width and preserve their intrinsic aspect ratio. (https://github.com/mozdevs/cssremedy/issues/14)
*/

img,
video {
  max-width: 100%;
  height: auto;
}

/*
Ensure the default browser behavior of the `hidden` attribute.
*/

[hidden] {
  display: none;
}

*, ::before, ::after {
  --tw-translate-x: 0;
  --tw-translate-y: 0;
  --tw-rotate: 0;
  --tw-skew-x: 0;
  --tw-skew-y: 0;
  --tw-scale-x: 1;
  --tw-scale-y: 1;
  --tw-pan-x:  ;
  --tw-pan-y:  ;
  --tw-pinch-zoom:  ;
  --tw-scroll-snap-strictness: proximity;
  --tw-ordinal:  ;
  --tw-slashed-zero:  ;
  --tw-numeric-figure:  ;
  --tw-numeric-spacing:  ;
  --tw-numeric-fraction:  ;
  --tw-ring-inset:  ;
  --tw-ring-offset-width: 0px;
  --tw-ring-offset-color: #fff;
  --tw-ring-color: rgb(59 130 246 / 0.5);
  --tw-ring-offset-shadow: 0 0 #0000;
  --tw-ring-shadow: 0 0 #0000;
  --tw-shadow: 0 0 #0000;
  --tw-shadow-colored: 0 0 #0000;
  --tw-blur:  ;
  --tw-brightness:  ;
  --tw-contrast:  ;
  --tw-grayscale:  ;
  --tw-hue-rotate:  ;
  --tw-invert:  ;
  --tw-saturate:  ;
  --tw-sepia:  ;
  --tw-drop-shadow:  ;
  --tw-backdrop-blur:  ;
  --tw-backdrop-brightness:  ;
  --tw-backdrop-contrast:  ;
  --tw-backdrop-grayscale:  ;
  --tw-backdrop-hue-rotate:  ;
  --tw-backdrop-invert:  ;
  --tw-backdrop-opacity:  ;
  --tw-backdrop-saturate:  ;
  --tw-backdrop-sepia:  ;
}

.container {
  width: 100%;
}

@media (min-width: 480px) {
  .container {
    max-width: 480px;
  }
}

@media (min-width: 768px) {
  .container {
    max-width: 768px;
  }
}

@media (min-width: 976px) {
  .container {
    max-width: 976px;
  }
}

@media (min-width: 1440px) {
  .container {
    max-width: 1440px;
  }
}

.absolute {
  position: absolute;
}

.relative {
  position: relative;
}

.left-6 {
  left: 1.5rem;
}

.right-6 {
  right: 1.5rem;
}

.mx-auto {
  margin-left: auto;
  margin-right: auto;
}

.my-16 {
  margin-top: 4rem;
  margin-bottom: 4rem;
}

.my-6 {
  margin-top: 1.5rem;
  margin-bottom: 1.5rem;
}

.mt-10 {
  margin-top: 2.5rem;
}

.mb-32 {
  margin-bottom: 8rem;
}

.mb-4 {
  margin-bottom: 1rem;
}

.mt-32 {
  margin-top: 8rem;
}

.mt-24 {
  margin-top: 6rem;
}

.-mt-14 {
  margin-top: -3.5rem;
}

.block {
  display: block;
}

.flex {
  display: flex;
}

.hidden {
  display: none;
}

.h-8 {
  height: 2rem;
}

.w-16 {
  width: 4rem;
}

.max-w-md {
  max-width: 28rem;
}

.max-w-sm {
  max-width: 24rem;
}

.max-w-6xl {
  max-width: 72rem;
}

.flex-1 {
  flex: 1 1 0%;
}

.flex-col {
  flex-direction: column;
}

.flex-col-reverse {
  flex-direction: column-reverse;
}

.items-center {
  align-items: center;
}

.justify-center {
  justify-content: center;
}

.justify-between {
  justify-content: space-between;
}

.justify-around {
  justify-content: space-around;
}

.space-x-6 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-x-reverse: 0;
  margin-right: calc(1.5rem * var(--tw-space-x-reverse));
  margin-left: calc(1.5rem * calc(1 - var(--tw-space-x-reverse)));
}

.space-y-6 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-y-reverse: 0;
  margin-top: calc(1.5rem * calc(1 - var(--tw-space-y-reverse)));
  margin-bottom: calc(1.5rem * var(--tw-space-y-reverse));
}

.space-y-0 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-y-reverse: 0;
  margin-top: calc(0px * calc(1 - var(--tw-space-y-reverse)));
  margin-bottom: calc(0px * var(--tw-space-y-reverse));
}

.space-y-12 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-y-reverse: 0;
  margin-top: calc(3rem * calc(1 - var(--tw-space-y-reverse)));
  margin-bottom: calc(3rem * var(--tw-space-y-reverse));
}

.space-y-8 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-y-reverse: 0;
  margin-top: calc(2rem * calc(1 - var(--tw-space-y-reverse)));
  margin-bottom: calc(2rem * var(--tw-space-y-reverse));
}

.space-y-3 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-y-reverse: 0;
  margin-top: calc(0.75rem * calc(1 - var(--tw-space-y-reverse)));
  margin-bottom: calc(0.75rem * var(--tw-space-y-reverse));
}

.space-x-2 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-x-reverse: 0;
  margin-right: calc(0.5rem * var(--tw-space-x-reverse));
  margin-left: calc(0.5rem * calc(1 - var(--tw-space-x-reverse)));
}

.space-x-4 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-x-reverse: 0;
  margin-right: calc(1rem * var(--tw-space-x-reverse));
  margin-left: calc(1rem * calc(1 - var(--tw-space-x-reverse)));
}

.space-x-32 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-x-reverse: 0;
  margin-right: calc(8rem * var(--tw-space-x-reverse));
  margin-left: calc(8rem * calc(1 - var(--tw-space-x-reverse)));
}

.space-x-3 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-x-reverse: 0;
  margin-right: calc(0.75rem * var(--tw-space-x-reverse));
  margin-left: calc(0.75rem * calc(1 - var(--tw-space-x-reverse)));
}

.self-end {
  align-self: flex-end;
}

.rounded-full {
  border-radius: 9999px;
}

.rounded-lg {
  border-radius: 0.5rem;
}

.rounded-l-full {
  border-top-left-radius: 9999px;
  border-bottom-left-radius: 9999px;
}

.bg-brightRed {
  --tw-bg-opacity: 1;
  background-color: hsla(188, 100%, 50%, 1);
}

.bg-white {
  --tw-bg-opacity: 1;
  background-color: rgb(255 255 255 / var(--tw-bg-opacity));
}

.bg-brightRedSupLight {
  --tw-bg-opacity: 1;
  background-color: hsl(12 88% 95% / var(--tw-bg-opacity));
}

.bg-veryLightGray {
  --tw-bg-opacity: 1;
  background-color: hsl(0 0% 98% / var(--tw-bg-opacity));
}

.bg-veryDarkBlue {
  --tw-bg-opacity: 1;
  background-color: hsl(233 12% 13% / var(--tw-bg-opacity));
}

.p-6 {
  padding: 1.5rem;
}

.p-3 {
  padding: 0.75rem;
}

.px-6 {
  padding-left: 1.5rem;
  padding-right: 1.5rem;
}

.py-8 {
  padding-top: 2rem;
  padding-bottom: 2rem;
}

.px-4 {
  padding-left: 1rem;
  padding-right: 1rem;
}

.py-2 {
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
}

.px-5 {
  padding-left: 1.25rem;
  padding-right: 1.25rem;
}

.py-24 {
  padding-top: 6rem;
  padding-bottom: 6rem;
}

.py-10 {
  padding-top: 2.5rem;
  padding-bottom: 2.5rem;
}

.pt-2 {
  padding-top: 0.5rem;
}

.text-center {
  text-align: center;
}

.text-4xl {
  font-size: 2.25rem;
  line-height: 2.5rem;
}

.text-base {
  font-size: 1rem;
  line-height: 1.5rem;
}

.text-lg {
  font-size: 1.125rem;
  line-height: 1.75rem;
}

.text-sm {
  font-size: 0.875rem;
  line-height: 1.25rem;
}

.text-5xl {
  font-size: 3rem;
  line-height: 1;
}

.font-bold {
  font-weight: 700;
}

.leading-tight {
  line-height: 1.25;
}

.text-white {
  --tw-text-opacity: 1;
  color: rgb(255 255 255 / var(--tw-text-opacity));
}

.text-darkGrayishBlue {
  --tw-text-opacity: 1;
  color: hsl(227 12% 61% / var(--tw-text-opacity));
}

.text-brightRed {
  --tw-text-opacity: 1;
  color: hsla(188, 100%, 50%, 1);
}

.shadow-2xl {
  --tw-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
  --tw-shadow-colored: 0 25px 50px -12px var(--tw-shadow-color);
  box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}

.drop-shadow-md {
  --tw-drop-shadow: drop-shadow(0 4px 3px rgb(0 0 0 / 0.07)) drop-shadow(0 2px 2px rgb(0 0 0 / 0.06));
  filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
}

body {
  background-image: url('../img/bg-tablet-pattern.svg');
  background-repeat: no-repeat;
  background-size: 800px;
  background-position: 90% -25%;
}

#cta {
  background-image: url('../img/bg-simplify-section-desktop.svg');
  background-repeat: no-repeat;
}

@media (max-width: 576px) {
  body {
    background-position: 50px -50px;
    background-size: 500px;
  }

  #cta {
    background-image: url('../img/bg-simplify-section-mobile.svg');
  }
}

/* Hamburger Menu */

.hamburger {
  cursor: pointer;
  width: 24px;
  height: 24px;
  transition: all 0.25s;
  position: relative;
}

.hamburger-top,
.hamburger-middle,
.hamburger-bottom {
  position: absolute;
  top: 0;
  left: 0;
  width: 24px;
  height: 2px;
  background: #000;
  transform: rotate(0);
  transition: all 0.5s;
}

.hamburger-middle {
  transform: translateY(7px);
}

.hamburger-bottom {
  transform: translateY(14px);
}

.open {
  transform: rotate(90deg);
  transform: translateY(0px);
}

.open .hamburger-top {
  transform: rotate(45deg) translateY(6px) translate(6px);
}

.open .hamburger-middle {
  display: none;
}

.open .hamburger-bottom {
  transform: rotate(-45deg) translateY(6px) translate(-6px);
}

.hover\:bg-brightRedLight:hover {
  --tw-bg-opacity: 1;
  background-color: hsla(188, 100%, 80%, 1);
}

.hover\:bg-gray-900:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(17 24 39 / var(--tw-bg-opacity));
}

.hover\:text-darkGrayishBlue:hover {
  --tw-text-opacity: 1;
  color: hsl(227 12% 61% / var(--tw-text-opacity));
}

.hover\:text-brightRed:hover {
  --tw-text-opacity: 1;
  color: hsl(12 88% 59% / var(--tw-text-opacity));
}

.focus\:outline-none:focus {
  outline: 2px solid transparent;
  outline-offset: 2px;
}

@media (min-width: 480px) {
  .sm\:w-auto {
    width: auto;
  }

  .sm\:self-center {
    align-self: center;
  }
}

@media (min-width: 768px) {
  .md\:mb-4 {
    margin-bottom: 1rem;
  }

  .md\:block {
    display: block;
  }

  .md\:flex {
    display: flex;
  }

  .md\:hidden {
    display: none;
  }

  .md\:w-1\/2 {
    width: 50%;
  }

  .md\:w-1\/3 {
    width: 33.333333%;
  }

  .md\:max-w-xl {
    max-width: 36rem;
  }

  .md\:flex-row {
    flex-direction: row;
  }

  .md\:flex-col {
    flex-direction: column;
  }

  .md\:items-start {
    align-items: flex-start;
  }

  .md\:justify-start {
    justify-content: flex-start;
  }

  .md\:space-y-0 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-y-reverse: 0;
    margin-top: calc(0px * calc(1 - var(--tw-space-y-reverse)));
    margin-bottom: calc(0px * var(--tw-space-y-reverse));
  }

  .md\:space-x-6 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-x-reverse: 0;
    margin-right: calc(1.5rem * var(--tw-space-x-reverse));
    margin-left: calc(1.5rem * calc(1 - var(--tw-space-x-reverse)));
  }

  .md\:bg-transparent {
    background-color: transparent;
  }

  .md\:py-1 {
    padding-top: 0.25rem;
    padding-bottom: 0.25rem;
  }

  .md\:py-12 {
    padding-top: 3rem;
    padding-bottom: 3rem;
  }

  .md\:text-left {
    text-align: left;
  }

  .md\:text-5xl {
    font-size: 3rem;
    line-height: 1;
  }

  .md\:text-4xl {
    font-size: 2.25rem;
    line-height: 2.5rem;
  }
}
        </style>
    </head>
    <body class="antialiased">
        <div class="">
            <nav class="relative container mx-auto p-6">
                <!-- Flex container -->
                <div class="flex items-center justify-between">
                  <!-- Logo -->
                  <div class="pt-2">
                    <span class="text-2xl font-bold text-blue text-brightRed">Props</span><span class="text-2xl font-bold text-darkGrayishBlue">Manager</span>
                  </div>
                  <!-- Menu Items -->
                  <div class="hidden space-x-6 md:flex">
                    <a href="#" class="hover:text-darkGrayishBlue">Pricing</a>
                    <a href="#" class="hover:text-darkGrayishBlue">Product</a>
                    <a href="#" class="hover:text-darkGrayishBlue">About Us</a>
                    <a href="#" class="hover:text-darkGrayishBlue">Community</a>
                  </div>
                  <!-- Button -->
                  <a
                    href="#"
                    class="hidden p-3 px-6 pt-2 text-white bg-brightRed rounded-full baseline hover:bg-brightRedLight md:block"
                    >Get Started</a
                  >
          
                  <!-- Hamburger Icon -->
                  <button
                    id="menu-btn"
                    class="block hamburger md:hidden focus:outline-none"
                  >
                    <span class="hamburger-top"></span>
                    <span class="hamburger-middle"></span>
                    <span class="hamburger-bottom"></span>
                  </button>
                </div>
          
                <!-- Mobile Menu -->
                <div class="md:hidden">
                  <div
                    id="menu"
                    class="absolute flex-col items-center hidden self-end py-8 mt-10 space-y-6 font-bold bg-white sm:w-auto sm:self-center left-6 right-6 drop-shadow-md"
                  >
                    <a href="#">Pricing</a>
                    <a href="#">Product</a>
                    <a href="#">About Us</a>
                    <a href="#">Careers</a>
                    <a href="#">Community</a>
                  </div>
                </div>
              </nav>
          
              <!-- Hero Section -->
              <section id="hero">
                <!-- Flex Container -->
                <div
                  class="container flex flex-col-reverse items-center px-6 mx-auto mt-10 space-y-0 md:space-y-0 md:flex-row"
                >
                  <!-- Left item -->
                  <div class="flex flex-col mb-32 space-y-12 md:w-1/2">
                    <h1
                      class="max-w-md text-4xl font-bold text-center md:text-5xl md:text-left"
                    >
                      Bring everyone together to build better products
                    </h1>
                    <p class="max-w-sm text-center text-darkGrayishBlue md:text-left">
                      Manage makes it simple for software teams to plan day-to-day tasks
                      while keeping the larger team goals in view.
                    </p>
                    <div class="flex justify-center md:justify-start">
                      <a
                        href="#"
                        class="p-3 px-6 pt-2 text-white bg-brightRed rounded-full baseline hover:bg-brightRedLight"
                        >Request demo</a
                      >
                    </div>
                  </div>
                  <!-- Image -->
                  <div class="md:w-1/2">
                    <img src="img/illustration-intro.svg" alt="" />
                  </div>
                </div>
              </section>
          
              <!-- Features Section -->
              <section id="features">
                <!-- Flex container -->
                <div
                  class="container flex flex-col px-4 mx-auto mt-10 space-y-12 md:space-y-0 md:flex-row"
                >
                  <!-- What's Different -->
                  <div class="flex flex-col space-y-12 md:w-1/2">
                    <h2 class="max-w-md text-4xl font-bold text-center md:text-left">
                      What's different about Manage?
                    </h2>
                    <p class="max-w-sm text-center text-darkGrayishBlue md:text-left">
                      Manage provides all the functionality your team needs, without the
                      complexity. Our software is tailor-made for modern digital product
                      teams.
                    </p>
                  </div>
          
                  <!-- Numbered List -->
                  <div class="flex flex-col space-y-8 md:w-1/2">
                    <!-- List Item 1 -->
                    <div
                      class="flex flex-col space-y-3 md:space-y-0 md:space-x-6 md:flex-row"
                    >
                      <!-- Heading -->
                      <div class="rounded-l-full bg-brightRedSupLight md:bg-transparent">
                        <div class="flex items-center space-x-2">
                          <div
                            class="px-4 py-2 text-white rounded-full md:py-1 bg-brightRed"
                          >
                            01
                          </div>
                          <h3 class="text-base font-bold md:mb-4 md:hidden">
                            Track company-wide progress
                          </h3>
                        </div>
                      </div>
          
                      <div>
                        <h3 class="hidden mb-4 text-lg font-bold md:block">
                          Track company-wide progress
                        </h3>
                        <p class="text-darkGrayishBlue">
                          See how your day-to-day tasks fit into the wider vision. Go from
                          tracking progress at the milestone level all the way done to the
                          smallest of details. Never lose sight of the bigger picture
                          again.
                        </p>
                      </div>
                    </div>
          
                    <!-- List Item 2 -->
                    <div
                      class="flex flex-col space-y-3 md:space-y-0 md:space-x-6 md:flex-row"
                    >
                      <!-- Heading -->
                      <div class="rounded-l-full bg-brightRedSupLight md:bg-transparent">
                        <div class="flex items-center space-x-2">
                          <div
                            class="px-4 py-2 text-white rounded-full md:py-1 bg-brightRed"
                          >
                            02
                          </div>
                          <h3 class="text-base font-bold md:mb-4 md:hidden">
                            Advanced built-in reports
                          </h3>
                        </div>
                      </div>
          
                      <div>
                        <h3 class="hidden mb-4 text-lg font-bold md:block">
                          Advanced built-in reports
                        </h3>
                        <p class="text-darkGrayishBlue">
                          Set internal delivery estimates and track progress toward
                          company goals. Our customisable dashboard helps you build out
                          the reports you need to keep key stakeholders informed.
                        </p>
                      </div>
                    </div>
          
                    <!-- List Item 3 -->
                    <div
                      class="flex flex-col space-y-3 md:space-y-0 md:space-x-6 md:flex-row"
                    >
                      <!-- Heading -->
                      <div class="rounded-l-full bg-brightRedSupLight md:bg-transparent">
                        <div class="flex items-center space-x-2">
                          <div
                            class="px-4 py-2 text-white rounded-full md:py-1 bg-brightRed"
                          >
                            03
                          </div>
                          <h3 class="text-base font-bold md:mb-4 md:hidden">
                            Everything you need in one place
                          </h3>
                        </div>
                      </div>
          
                      <div>
                        <h3 class="hidden mb-4 text-lg font-bold md:block">
                          Everything you need in one place
                        </h3>
                        <p class="text-darkGrayishBlue">
                          Stop jumping from one service to another to communicate, store
                          files, track tasks and share documents. Manage offers an
                          all-in-one team productivity solution.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
          
              <!-- Testimonials -->
              <section id="testimonials">
                <!-- Container to heading and testm blocks -->
                <div class="max-w-6xl px-5 mx-auto mt-32 text-center">
                  <!-- Heading -->
                  <h2 class="text-4xl font-bold text-center">
                    What's Different About Manage?
                  </h2>
                  <!-- Testimonials Container -->
                  <div class="flex flex-col mt-24 md:flex-row md:space-x-6">
                    <!-- Testimonial 1 -->
                    <div
                      class="flex flex-col items-center p-6 space-y-6 rounded-lg bg-veryLightGray md:w-1/3"
                    >
                      <img src="img/avatar-anisha.png" class="w-16 -mt-14" alt="" />
                      <h5 class="text-lg font-bold">Anisha Li</h5>
                      <p class="text-sm text-darkGrayishBlue">
                        “Manage has supercharged our team’s workflow. The ability to
                        maintain visibility on larger milestones at all times keeps
                        everyone motivated.”
                      </p>
                    </div>
          
                    <!-- Testimonial 2 -->
                    <div
                      class="hidden flex-col items-center p-6 space-y-6 rounded-lg bg-veryLightGray md:flex md:w-1/3"
                    >
                      <img src="img/avatar-ali.png" class="w-16 -mt-14" alt="" />
                      <h5 class="text-lg font-bold">Ali Bravo</h5>
                      <p class="text-sm text-darkGrayishBlue">
                        “We have been able to cancel so many other subscriptions since
                        using Manage. There is no more cross-channel confusion and
                        everyone is much more focused.”
                      </p>
                    </div>
          
                    <!-- Testimonial 3 -->
                    <div
                      class="hidden flex-col items-center p-6 space-y-6 rounded-lg bg-veryLightGray md:flex md:w-1/3"
                    >
                      <img src="img/avatar-richard.png" class="w-16 -mt-14" alt="" />
                      <h5 class="text-lg font-bold">Richard Watts</h5>
                      <p class="text-sm text-darkGrayishBlue">
                        “Manage has supercharged our team’s workflow. The ability to
                        maintain visibility on larger milestones at all times keeps
                        everyone motivated.”
                      </p>
                    </div>
                  </div>
                  <!-- Button -->
                  <div class="my-16">
                    <a
                      href="#"
                      class="p-3 px-6 pt-2 text-white bg-brightRed rounded-full baseline hover:bg-brightRedLight"
                      >Get Started</a
                    >
                  </div>
                </div>
              </section>
          
              <!-- CTA Section -->
              <section id="cta" class="bg-brightRed">
                <!-- Flex Container -->
                <div
                  class="container flex flex-col items-center justify-between px-6 py-24 mx-auto space-y-12 md:py-12 md:flex-row md:space-y-0"
                >
                  <!-- Heading -->
                  <h2
                    class="text-5xl font-bold leading-tight text-center text-white md:text-4xl md:max-w-xl md:text-left"
                  >
                    Simplify how your team works today
                  </h2>
                  <!-- Button -->
                  <div>
                    <a
                      href="#"
                      class="p-3 px-6 pt-2 text-brightRed bg-white rounded-full shadow-2xl baseline hover:bg-gray-900"
                      >Get Started</a
                    >
                  </div>
                </div>
              </section>
          
              <!-- Footer -->
              <footer class="bg-veryDarkBlue">
                <!-- Flex Container -->
                <div
                  class="container flex flex-col-reverse justify-between px-6 py-10 mx-auto space-y-8 md:flex-row md:space-y-0"
                >
                  <!-- Logo and social links container -->
                  <div
                    class="flex flex-col-reverse items-center justify-between space-y-12 md:flex-col md:space-y-0 md:items-start"
                  >
                    <div class="mx-auto my-6 text-center text-white md:hidden">
                      Copyright &copy; 2022, All Rights Reserved
                    </div>
                    <!-- Logo -->
                    <div>
                      <img src="img/logo-white.svg" class="h-8" alt="" />
                    </div>
                    <!-- Social Links Container -->
                    <div class="flex justify-center space-x-4">
                      <!-- Link 1 -->
                      <a href="#">
                        <img src="img/icon-facebook.svg" alt="" class="h-8" />
                      </a>
                      <!-- Link 2 -->
                      <a href="#">
                        <img src="img/icon-youtube.svg" alt="" class="h-8" />
                      </a>
                      <!-- Link 3 -->
                      <a href="#">
                        <img src="img/icon-twitter.svg" alt="" class="h-8" />
                      </a>
                      <!-- Link 4 -->
                      <a href="#">
                        <img src="img/icon-pinterest.svg" alt="" class="h-8" />
                      </a>
                      <!-- Link 5 -->
                      <a href="#">
                        <img src="img/icon-instagram.svg" alt="" class="h-8" />
                      </a>
                    </div>
                  </div>
                  <!-- List Container -->
                  <div class="flex justify-around space-x-32">
                    <div class="flex flex-col space-y-3 text-white">
                      <a href="#" class="hover:text-brightRed">Home</a>
                      <a href="#" class="hover:text-brightRed">Pricing</a>
                      <a href="#" class="hover:text-brightRed">Products</a>
                      <a href="#" class="hover:text-brightRed">About</a>
                    </div>
                    <div class="flex flex-col space-y-3 text-white">
                      <a href="#" class="hover:text-brightRed">Careers</a>
                      <a href="#" class="hover:text-brightRed">Community</a>
                      <a href="#" class="hover:text-brightRed">Privacy Policy</a>
                    </div>
                  </div>
          
                  <!-- Input Container -->
                  <div class="flex flex-col justify-between">
                    <form>
                      <div class="flex space-x-3">
                        <input
                          type="text"
                          class="flex-1 px-4 rounded-full focus:outline-none"
                          placeholder="Updated in your inbox"
                        />
                        <button
                          class="px-6 py-2 text-white rounded-full bg-brightRed hover:bg-brightRedLight focus:outline-none"
                        >
                          Go
                        </button>
                      </div>
                    </form>
                    <div class="hidden text-white md:block">
                      Copyright &copy; 2022, All Rights Reserved
                    </div>
                  </div>
                </div>
              </footer>
        </div>

    </body>
</html>
