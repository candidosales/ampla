/*global module:false*/
module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    // Metadata.
    pkg: grunt.file.readJSON('package.json'),
    banner: '/*! <%= pkg.title || pkg.name %> - v<%= pkg.version %> - ' +
      '<%= grunt.template.today("yyyy-mm-dd") %>\n' +
      '<%= pkg.homepage ? "* " + pkg.homepage + "\\n" : "" %>' +
      '* Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author.name %>;' +
      ' Licensed <%= _.pluck(pkg.licenses, "type").join(", ") %> */\n',
    // Task configuration.
    dir:{
      assets: 'assets'
    },
    clean: {
      dist: {
        files: [{
          dot: true,
          src: [
            'css/*','js/*','img/*'
          ]
        }]
      }
    },
    less: {
      development: {
        files: {
          "<%= dir.assets %>/css/app.css": ["<%= dir.assets %>/css/app.less"]
        }
      },
      production: {
        options: {
          yuicompress: true
        },
        files: {
          "<%= dir.assets %>/css/<%= pkg.name %>.min.css": ["<%= dir.assets %>/css/style.less"]
        }
      }
    },
    cssmin: {
      add_banner: {
        options: {
          banner: '<%= banner %>'
        },
        files: {
          'css/<%= pkg.name %>.min.css': ['<%= dir.assets %>/css/<%= pkg.name %>.min.css']
        }
      }
    },
    imagemin: {
      dist: {
        options: {                       // Target options
          optimizationLevel: 7,
          progressive: true
        },
        files: [{
          expand: true,
          cwd: '<%= dir.assets %>/img',
          src: '{,*/}*.{png,jpg,jpeg}',
          dest: 'img'
        }]
      }
    },
    concat: {
      options: {
        banner: '<%= banner %>',
        stripBanners: true
      },
      dist: {
        src: ['<%= dir.assets %>/js/jquery-1.10.1.min.js','<%= dir.assets %>/js/jquery-ui.min.js','<%= dir.assets %>/js/foundation.min.js','<%= dir.assets %>/js/vendor/custom.modernizr.js','<%= dir.assets %>/js/enquire.min.js','<%= dir.assets %>/js/vendor/slimScroll/jquery.slimscroll.min.js','<%= dir.assets %>/js/jquery.isotope.min.js','<%= dir.assets %>/js/script.js'],
        dest: '<%= dir.assets %>/js/<%= pkg.name %>.js'
      }
    },
    uglify: {
      options: {
        banner: '<%= banner %>'
      },
      dist: {
        src: '<%= concat.dist.dest %>',
        dest: 'js/<%= pkg.name %>.min.js'
      }
    },
    copy: {
            dist: {
                files: [
                  {expand: true, dot: true, cwd: '<%= dir.assets %>/css', dest: 'css', src: ['fonts/*','bootstrap.css', 'prettify.css', 'bootstrap-wysihtml5.css', 'admin.css']},
                  {expand: true, dot: true, cwd: '<%= dir.assets %>/js', dest: 'js', src: ['vendor/*']}]
            }
        },
  });

  // These plugins provide necessary tasks.
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-copy');

  // Default task.
  grunt.registerTask('default', ['clean:dist','less:production','cssmin', 'imagemin','concat', 'uglify','copy:dist']);

};
