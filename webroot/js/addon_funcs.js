/**
 * JavaScript functions for add-on management
 */
var Addon = {

    /**
     * Creates an add-on slug from a specified add-on name
     * @param name  Name of the add-on
     * @return slug for the add-on
     */
    slugify: function(name) {
      // Source: https://gist.github.com/mathewbyrne/1280286
      return name.toString().toLowerCase()
            .replace(/\s+/g, '-')           // Replace spaces with -
            .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
            .replace(/\-\-+/g, '-')         // Replace multiple - with single -
            .replace(/^-+/, '')             // Trim - from start of text
            .replace(/-+$/, '');            // Trim - from end of text
    }
}
