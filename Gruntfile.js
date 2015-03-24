module.exports = function(grunt) {
	require('time-grunt')(grunt);
	require('jit-grunt')(grunt, {
		newer: 'grunt-newer',
		imagemin: 'grunt-contrib-imagemin'
	});

	grunt.initConfig({
		sass: {
			development: {
				options: {
					style: 'expanded'
				},
				files: [{
					expand: true,
					cwd: 'resources/layout/',
					src: ['**/*.scss'],
					dest: 'public/layout/css/',
					ext: '.css'
				}]
			},
			production: {
				options: {
					style: 'compressed'
				},
				files: [{
					expand: true,
					cwd: 'resources/layout/',
					src: ['**/*.scss'],
					dest: 'public/layout/css/',
					ext: '.css'
				}]
			}
		},
		imagemin: {
			all: {
				files: [{
					expand: true,
					cwd: 'resources/',
					src: ['layout/img/**/*.{png,jpg,gif}'],
					dest: 'public/'
				}]
			}
		},
		watch: {
			css: {
				files: ['public/layout/css/**/*.css'],
				options: {
					livereload: true
				}
			},
			sass: {
				files: ['resources/layout/**/*.scss'],
				tasks: ['newer:sass:development']
			},
			imagemin: {
				files: ['resources/layout/img/**/*.{png,jpg,gif}'],
				tasks: ['newer:imagemin:all']
			},
			options: {
				livereload: true
			}
		}
	});

	grunt.registerTask('default', ['development', 'watch']);
	grunt.registerTask('development', ['newer:sass:development', 'newer:imagemin:all']);
	grunt.registerTask('production', ['newer:sass:production', 'newer:imagemin:all']);
};
