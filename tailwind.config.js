/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/**/**/*.vue",
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php"
  ],
  theme: {
    extend: {
      colors:{
        "background":"#E3E3E6",
        "font_color":"RGB(161, 157, 156)",
        "border_tabla":"RGB(201, 200, 202)"
      },
      

    },
  },
  plugins: [],
}

