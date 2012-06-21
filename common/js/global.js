/*
* global.js
*
* ---------
*
*/

/*** TABLE OF CONTENTS ***
*
* 1. Utils
* 2. Init
*/


/* 1. Util
----------------------------------------------------------------------------------------------------*/



/* 2. Utils
----------------------------------------------------------------------------------------------------*/

var BGT = BGT || {};

BGT.util = (function ($, me) {

  /*
  * @function
  * @name getTemplate
  * @description Use mustache to grab and render HTML
  * @param {String} templateUrl
  * @param {String} data
  *
  */
  me.getTemplate = function (params, callback) {
    $.ajax({
      url: params.templateUrl,
      dataType: 'html',
      success: function(templateHtml) {
        callback(templateHtml);
      },
      error: function(xhr, ajaxOptions, thrownError) {
        callback({
          xhr: xhr,
          ajaxOptions: ajaxOptions,
          thrownError: thrownError
        });
      }
    });
  }

   /*
  * @function
  * @name getTemplate
  * @description Use mustache to grab and render HTML
  * @param {String} templateUrl
  * @param {String} data
  *
  */
  me.getAll = function (params, callback) {
    var template = '',
        partials = {},
        partialsLength = params.partials.length,
        counter = 0,
        loadTemplate = function () {
          BGT.util.getTemplate({
            "templateUrl": params.templateUrl
          }, function (templateHtml) {
            template = templateHtml;
            loadPartials();
          });
        },
        loadPartials = function () {
          BGT.util.getTemplate({
            "templateUrl": params.partials[counter].url
          }, function (templateHtml) {
            partials[params.partials[counter].name] = templateHtml;
            counter ++;
            if (counter < partialsLength) {
              loadPartials();
            } else {
              callback({
                "template": template,
                "partials": partials
              });
            }
          });
        };
      loadTemplate();
  }

  return me

})(jQuery, BGT.util || {});

var data = template = "frame",
data = {
  categories: [
    {
      posts: [
        { 
          postTitle: "Title 1",
          postAttributes: [
            "attr1",
            "attr2",
            "attr3"
          ]
        },
        { 
          postTitle: "Title 2",
          postAttributes: [
            "attr4",
            "attr5",
            "attr6"
          ]
        },
        { 
          postTitle: "Title 3",
          postAttributes: [
            "attr7",
            "attr8",
            "attr9"
          ]
        }
      ]
    },
    {
      posts: [
        { 
          postTitle: "Title 4",
          postAttributes: [
            "attr1",
            "attr2",
            "attr3"
          ]
        },
        { 
          postTitle: "Title 5",
          postAttributes: [
            "attr4",
            "attr5",
            "attr6"
          ]
        },
        { 
          postTitle: "Title 6",
          postAttributes: [
            "attr7",
            "attr8",
            "attr9"
          ]
        }
      ]
    },
    {
      posts: [
        { 
          postTitle: "Title 7",
          postAttributes: [
            "attr1",
            "attr2",
            "attr3"
          ]
        },
        { 
          postTitle: "Title 8",
          postAttributes: [
            "attr4",
            "attr5",
            "attr6"
          ]
        },
        { 
          postTitle: "Title 9",
          postAttributes: [
            "attr7",
            "attr8",
            "attr9"
          ]
        }
      ]
    }
  ],
  news: [
    {
      posts: [
        { 
          postTitle: "Title 1",
          postAttributes: [
            "attr1",
            "attr2",
            "attr3"
          ]
        },
        { 
          postTitle: "Title 2",
          postAttributes: [
            "attr4",
            "attr5",
            "attr6"
          ]
        },
        { 
          postTitle: "Title 3",
          postAttributes: [
            "attr7",
            "attr8",
            "attr9"
          ]
        }
      ]
    },
    {
      posts: [
        { 
          postTitle: "Title 4",
          postAttributes: [
            "attr1",
            "attr2",
            "attr3"
          ]
        },
        { 
          postTitle: "Title 5",
          postAttributes: [
            "attr4",
            "attr5",
            "attr6"
          ]
        },
        { 
          postTitle: "Title 6",
          postAttributes: [
            "attr7",
            "attr8",
            "attr9"
          ]
        }
      ]
    },
    {
      posts: [
        { 
          postTitle: "Title 7",
          postAttributes: [
            "attr1",
            "attr2",
            "attr3"
          ]
        },
        { 
          postTitle: "Title 8",
          postAttributes: [
            "attr4",
            "attr5",
            "attr6"
          ]
        },
        { 
          postTitle: "Title 9",
          postAttributes: [
            "attr7",
            "attr8",
            "attr9"
          ]
        }
      ]
    }
  ]
};

$('#init').bind('click', function () {
  BGT.util.getAll({
    "templateUrl": '/wordpress-mustache-test/views/page/page.html',
    "partials": [
      {
        "name": 'frame',
        "url": '/wordpress-mustache-test/views/frame/frame.html'
      },
      {
        "name": 'post',
        "url": '/wordpress-mustache-test/views/post/post.html'
      }
    ]
  }, function (params) {
    $('body').append(Mustache.render(params.template, data, params.partials));
  });
})