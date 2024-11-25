module.exports = {
	root: true,
	extends: ['plugin:vue/vue3-recommended', 'eslint:recommended'],
	rules: {
		'linebreak-style': ['off'],
		indent: ['error', 'tab', { SwitchCase: 1 }],
		'object-curly-spacing': ['error', 'always'],
		'func-names': 'off',
		'prefer-const': 'off',
		'no-tabs': 'off',
		'no-plusplus': 'off',
		quotes: 'off',
		'max-len': 'off',
		'no-undef': 'off',
		'vue/multi-word-component-names': 'off',
		'vue/valid-attribute-name': 'off',
		'vue/no-reserved-component-names': 'off',
		'vue/html-self-closing': 'off',
		'no-unused-vars': 'off',
	},
	parserOptions: {
		ecmaVersion: 'latest',
	},
}
