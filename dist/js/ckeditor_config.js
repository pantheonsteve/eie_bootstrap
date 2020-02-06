CKEDITOR.editorConfig = function( config )
{
  // config.styleSet is an array of objects that define each style available
  // in the font styles tool in the ckeditor toolbar
  config.stylesSet =
  [
    /* Block Styles */
    { name : 'H1', element : 'h1' },
    { name : 'H2', element : 'h2' },
    { name : 'H3', element : 'h3' },
    { name : 'H4', element : 'h4' },
    { name : 'H5', element : 'h5' },

    /* Object Styles */
    {
        name : 'Normal Paragraph',
        element : 'p',
        attributes :
        {
          'class' : ''
        }
    },
    {
       name : 'Intro Text',
       element : 'p',
       attributes :
       {
          'class' : 'intro-text'
       }
    },
    {
       name : 'View More Link',
       element : 'a',
       attributes :
       {
          'class' : 'more-link'
       }
    },
    {
       name : 'Custom Table',
       element : 'table',
       attributes :
       {
          'class' : 'fancy-table'
       }
    },
    {
       name : 'Left Aligned Image',
       element : 'img',
       attributes :
       {
          'class' : 'img-align-left'
       }
    },
    {
      name : 'Right Aligned Image',
      element : 'img',
      attributes :
      {
           'class' : 'img-align-right'
      }
    },
    {
      name : 'stylized list',
      element : 'ul',
      attributes :
      {
           'class' : 'gray-bullet-list'
      }
    },
  ];

};

// Adding Typekit Script to CKEditor iframe
// ---
// This unfortunately doesn't work at the moment because CKEditor doesn't include a src value
// in the iframe that holds the editor content. The issue is that TypeKit can't validate
// the domain of the iframe because the src attribute is empty.
// ---
//
// CKEDITOR.on('instanceReady', function (ev) {

//   var $script = document.createElement('script'),
//       $editor_instance = CKEDITOR.instances[ev.editor.name];

//   $script.src = '//use.typekit.com/cxs2rap.js';
//   $script.onload = function() {
//       try{$editor_instance.window.$.Typekit.load();}catch(e){}
//   };

//   $editor_instance.document.getHead().$.appendChild($script);
// });

CKEDITOR.on('instanceReady', function (ev) {
//CKEditor chose to use style attributes for images instead of width and height, OHO doesn't agree
//Work-around from Stackoverflow with a minor edit- http://stackoverflow.com/questions/2051896/ckeditor-prevent-adding-image-dimensions-as-a-css-style
//Issue in CKEditor Bugtracker - http://dev.ckeditor.com/ticket/5547
//console.log(ev);
ev.editor.dataProcessor.htmlFilter.addRules({
    elements: {
      $: function (element) {
          // Output dimensions of images as width and height
          if (element.name == 'img') {
              var style = element.attributes.style;

              if (style) {
                  // Get the width from the style.
                  var match = /(?:^|\s)width\s*:\s*(\d+)px/i.exec(style),
                      width = match && match[1];

                  // Get the height from the style.
                  match = /(?:^|\s)height\s*:\s*(\d+)px/i.exec(style);
                  var height = match && match[1];

                  if (width) {
                      element.attributes.style = element.attributes.style.replace(/(?:^|\s)width\s*:\s*(\d+)px;?/i, '');
                      element.attributes.width = width;
                  }

                  if (height) {
                      element.attributes.style = element.attributes.style.replace(/(?:^|\s)height\s*:\s*(\d+)px;?/i, '');
                      element.attributes.height = height;
                  }
              }
          }

          //Make sure we aren't leaving behind an empty style attribute
          if (!element.attributes.style || element.attributes.style == ' ') {
            delete element.attributes.style;
          }

          return element;
      }
    }
  });
});