const plugin = require('tailwindcss/plugin')
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
export default {
	content: [
		'./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
		'./storage/framework/views/*.php',
		'./resources/views/**/*.blade.php',
		'./resources/js/**/*.vue',
		'./node_modules/vue-tailwind-datepicker/**/*.js'
	],
	theme: {
		extend: {
			colors: {
				'shire-green': '#8CB369',
				'shire-green-dark': '#588157',
				'bree-brown': '#A98467',
				'rivendell-blue': '#3D405B',
				'rivendell-blue-light': '#5FA8D3',
				'rivendell-gray': '#2A2A2A',
				'lothlorien-gold': '#F2CC8F',
				'moria-gray': '#26262B',
				'gondor-beige': '#F4F1DE',
				'gondor-light': '#F1EFE5',
				'mordor-red': '#E26D5C',
				'mordor-red-dark': '#c9302c',
				black: '#19171B',
				white: '#FFF',
				'white-smoke': '#f2f2f2',
				'vtd-primary': colors.green,
				'vtd-secondary': colors.gray,
			},
			backgroundImage: {
				'shire': "url('/images/shire-image.jpg')",
			},
			fontFamily: {
				almendra: ['Almendra', 'serif'],
				cardo: ['Cardo', 'serif'],
				raleway: ['Raleway', 'sans-serif'],
			},
			fontSize: {
				xs: '0.813rem',
				sm: '0.938rem',
			},
			screens: {
				sm: '480px',
				// => @media (min-width: 640px) { ... }
				md: '768px',
				// => @media (min-width: 768px) { ... }
				lg: '1024px',
				// => @media (min-width: 1024px) { ... }
				xl: '1280px',
				// => @media (min-width: 1280px) { ... }
			},
		},
	},
	plugins: [
		plugin(({ addVariant }) => {
			// add variants here
		})
	]
}