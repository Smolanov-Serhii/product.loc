/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ (function(module) {

eval("var token = $('meta[name=\"csrf-token\"]').attr('content');\nvar upload_link = '/admin/upload/image';\n\nfunction uploadImage(image, editor) {\n  var data = new FormData();\n  data.append(\"image\", image);\n  data.append('_token', token);\n  $.ajax({\n    url: upload_link,\n    cache: false,\n    contentType: false,\n    processData: false,\n    data: data,\n    type: \"post\",\n    success: function success(data) {\n      var image = \"<picture>\\n                <source srcSet=\\\"/uploads/\".concat(data.urls['webp'], \"\\\" type=\\\"image/webp\\\">\\n                <img src=\\\"/uploads/\").concat(data.urls['original'], \"\\\" alt=\\\"\\u043E\\u043F\\u0438\\u0441\\u0430\\u043D\\u0438\\u0435\\\"/>\\n            </picture>\");\n      $(editor).summernote(\"pasteHTML\", image);\n    },\n    error: function error(data) {\n      console.log('error', data);\n    }\n  });\n}\n\nvar summernote_config = {\n  toolbar: [['style', ['style']], ['font', ['bold', 'underline', 'clear']], ['fontname', ['fontname']], ['fontsize', ['fontsize']], ['color', ['color']], ['para', ['ul', 'ol', 'paragraph']], ['table', ['table']], ['insert', ['link', 'picture', 'video']], ['view', ['fullscreen', 'codeview', 'help']]],\n  popover: false,\n  callbacks: {\n    onImageUpload: function onImageUpload(files) {\n      uploadImage(files[0], this);\n    }\n  }\n};\nmodule.exports = {\n  module: {\n    rules: [{\n      // You can use `regexp`\n      // test: /vendor\\.js/$\n      test: /\\.css$/,\n      loader: 'exports-loader',\n      use: ['style-loader', 'css-loader'] // options: {\n      //     exports: 'myFunction',\n      // },\n\n    }]\n  },\n  token: token,\n  summernote_config: summernote_config\n};//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYXBwLmpzP2NlZDYiXSwibmFtZXMiOlsidG9rZW4iLCIkIiwiYXR0ciIsInVwbG9hZF9saW5rIiwidXBsb2FkSW1hZ2UiLCJpbWFnZSIsImVkaXRvciIsImRhdGEiLCJGb3JtRGF0YSIsImFwcGVuZCIsImFqYXgiLCJ1cmwiLCJjYWNoZSIsImNvbnRlbnRUeXBlIiwicHJvY2Vzc0RhdGEiLCJ0eXBlIiwic3VjY2VzcyIsInVybHMiLCJzdW1tZXJub3RlIiwiZXJyb3IiLCJjb25zb2xlIiwibG9nIiwic3VtbWVybm90ZV9jb25maWciLCJ0b29sYmFyIiwicG9wb3ZlciIsImNhbGxiYWNrcyIsIm9uSW1hZ2VVcGxvYWQiLCJmaWxlcyIsIm1vZHVsZSIsImV4cG9ydHMiLCJydWxlcyIsInRlc3QiLCJsb2FkZXIiLCJ1c2UiXSwibWFwcGluZ3MiOiJBQUFBLElBQU1BLEtBQUssR0FBR0MsQ0FBQyxDQUFDLHlCQUFELENBQUQsQ0FBNkJDLElBQTdCLENBQWtDLFNBQWxDLENBQWQ7QUFDQSxJQUFNQyxXQUFXLEdBQUcscUJBQXBCOztBQUVBLFNBQVNDLFdBQVQsQ0FBcUJDLEtBQXJCLEVBQTRCQyxNQUE1QixFQUFvQztBQUVoQyxNQUFJQyxJQUFJLEdBQUcsSUFBSUMsUUFBSixFQUFYO0FBRUFELEVBQUFBLElBQUksQ0FBQ0UsTUFBTCxDQUFZLE9BQVosRUFBcUJKLEtBQXJCO0FBQ0FFLEVBQUFBLElBQUksQ0FBQ0UsTUFBTCxDQUFZLFFBQVosRUFBc0JULEtBQXRCO0FBRUFDLEVBQUFBLENBQUMsQ0FBQ1MsSUFBRixDQUFPO0FBQ0hDLElBQUFBLEdBQUcsRUFBRVIsV0FERjtBQUVIUyxJQUFBQSxLQUFLLEVBQUUsS0FGSjtBQUdIQyxJQUFBQSxXQUFXLEVBQUUsS0FIVjtBQUlIQyxJQUFBQSxXQUFXLEVBQUUsS0FKVjtBQUtIUCxJQUFBQSxJQUFJLEVBQUVBLElBTEg7QUFNSFEsSUFBQUEsSUFBSSxFQUFFLE1BTkg7QUFPSEMsSUFBQUEsT0FBTyxFQUFFLGlCQUFTVCxJQUFULEVBQWU7QUFFcEIsVUFBSUYsS0FBSyxrRUFDc0JFLElBQUksQ0FBQ1UsSUFBTCxDQUFVLE1BQVYsQ0FEdEIsMEVBRWdCVixJQUFJLENBQUNVLElBQUwsQ0FBVSxVQUFWLENBRmhCLDBGQUFUO0FBS0FoQixNQUFBQSxDQUFDLENBQUNLLE1BQUQsQ0FBRCxDQUFVWSxVQUFWLENBQXFCLFdBQXJCLEVBQWtDYixLQUFsQztBQUNILEtBZkU7QUFnQkhjLElBQUFBLEtBQUssRUFBRSxlQUFTWixJQUFULEVBQWU7QUFDbEJhLE1BQUFBLE9BQU8sQ0FBQ0MsR0FBUixDQUFZLE9BQVosRUFBcUJkLElBQXJCO0FBQ0g7QUFsQkUsR0FBUDtBQW9CSDs7QUFFRCxJQUFNZSxpQkFBaUIsR0FBRztBQUN0QkMsRUFBQUEsT0FBTyxFQUFFLENBQ0wsQ0FBQyxPQUFELEVBQVUsQ0FBQyxPQUFELENBQVYsQ0FESyxFQUVMLENBQUMsTUFBRCxFQUFTLENBQUMsTUFBRCxFQUFTLFdBQVQsRUFBc0IsT0FBdEIsQ0FBVCxDQUZLLEVBR0wsQ0FBQyxVQUFELEVBQWEsQ0FBQyxVQUFELENBQWIsQ0FISyxFQUlMLENBQUMsVUFBRCxFQUFhLENBQUMsVUFBRCxDQUFiLENBSkssRUFLTCxDQUFDLE9BQUQsRUFBVSxDQUFDLE9BQUQsQ0FBVixDQUxLLEVBTUwsQ0FBQyxNQUFELEVBQVMsQ0FBQyxJQUFELEVBQU8sSUFBUCxFQUFhLFdBQWIsQ0FBVCxDQU5LLEVBT0wsQ0FBQyxPQUFELEVBQVUsQ0FBQyxPQUFELENBQVYsQ0FQSyxFQVFMLENBQUMsUUFBRCxFQUFXLENBQUMsTUFBRCxFQUFTLFNBQVQsRUFBb0IsT0FBcEIsQ0FBWCxDQVJLLEVBU0wsQ0FBQyxNQUFELEVBQVMsQ0FBQyxZQUFELEVBQWUsVUFBZixFQUEyQixNQUEzQixDQUFULENBVEssQ0FEYTtBQVl0QkMsRUFBQUEsT0FBTyxFQUFFLEtBWmE7QUFhdEJDLEVBQUFBLFNBQVMsRUFBRTtBQUNQQyxJQUFBQSxhQUFhLEVBQUUsdUJBQVNDLEtBQVQsRUFBZ0I7QUFDM0J2QixNQUFBQSxXQUFXLENBQUN1QixLQUFLLENBQUMsQ0FBRCxDQUFOLEVBQVcsSUFBWCxDQUFYO0FBQ0g7QUFITTtBQWJXLENBQTFCO0FBb0JBQyxNQUFNLENBQUNDLE9BQVAsR0FBaUI7QUFDYkQsRUFBQUEsTUFBTSxFQUFFO0FBQ0pFLElBQUFBLEtBQUssRUFBRSxDQUNIO0FBQ0k7QUFDQTtBQUNBQyxNQUFBQSxJQUFJLEVBQUUsUUFIVjtBQUlJQyxNQUFBQSxNQUFNLEVBQUUsZ0JBSlo7QUFLSUMsTUFBQUEsR0FBRyxFQUFFLENBQUMsY0FBRCxFQUFpQixZQUFqQixDQUxULENBTUk7QUFDQTtBQUNBOztBQVJKLEtBREc7QUFESCxHQURLO0FBZWJqQyxFQUFBQSxLQUFLLEVBQUVBLEtBZk07QUFnQmJzQixFQUFBQSxpQkFBaUIsRUFBRUE7QUFoQk4sQ0FBakIiLCJzb3VyY2VzQ29udGVudCI6WyJjb25zdCB0b2tlbiA9ICQoJ21ldGFbbmFtZT1cImNzcmYtdG9rZW5cIl0nKS5hdHRyKCdjb250ZW50Jyk7XG5jb25zdCB1cGxvYWRfbGluayA9ICcvYWRtaW4vdXBsb2FkL2ltYWdlJztcblxuZnVuY3Rpb24gdXBsb2FkSW1hZ2UoaW1hZ2UsIGVkaXRvcikge1xuXG4gICAgdmFyIGRhdGEgPSBuZXcgRm9ybURhdGEoKTtcblxuICAgIGRhdGEuYXBwZW5kKFwiaW1hZ2VcIiwgaW1hZ2UpO1xuICAgIGRhdGEuYXBwZW5kKCdfdG9rZW4nLCB0b2tlbik7XG5cbiAgICAkLmFqYXgoe1xuICAgICAgICB1cmw6IHVwbG9hZF9saW5rLFxuICAgICAgICBjYWNoZTogZmFsc2UsXG4gICAgICAgIGNvbnRlbnRUeXBlOiBmYWxzZSxcbiAgICAgICAgcHJvY2Vzc0RhdGE6IGZhbHNlLFxuICAgICAgICBkYXRhOiBkYXRhLFxuICAgICAgICB0eXBlOiBcInBvc3RcIixcbiAgICAgICAgc3VjY2VzczogZnVuY3Rpb24oZGF0YSkge1xuXG4gICAgICAgICAgICBsZXQgaW1hZ2UgPSBgPHBpY3R1cmU+XG4gICAgICAgICAgICAgICAgPHNvdXJjZSBzcmNTZXQ9XCIvdXBsb2Fkcy8ke2RhdGEudXJsc1snd2VicCddfVwiIHR5cGU9XCJpbWFnZS93ZWJwXCI+XG4gICAgICAgICAgICAgICAgPGltZyBzcmM9XCIvdXBsb2Fkcy8ke2RhdGEudXJsc1snb3JpZ2luYWwnXX1cIiBhbHQ9XCLQvtC/0LjRgdCw0L3QuNC1XCIvPlxuICAgICAgICAgICAgPC9waWN0dXJlPmA7XG5cbiAgICAgICAgICAgICQoZWRpdG9yKS5zdW1tZXJub3RlKFwicGFzdGVIVE1MXCIsIGltYWdlKTtcbiAgICAgICAgfSxcbiAgICAgICAgZXJyb3I6IGZ1bmN0aW9uKGRhdGEpIHtcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKCdlcnJvcicsIGRhdGEpO1xuICAgICAgICB9XG4gICAgfSk7XG59XG5cbmNvbnN0IHN1bW1lcm5vdGVfY29uZmlnID0ge1xuICAgIHRvb2xiYXI6IFtcbiAgICAgICAgWydzdHlsZScsIFsnc3R5bGUnXV0sXG4gICAgICAgIFsnZm9udCcsIFsnYm9sZCcsICd1bmRlcmxpbmUnLCAnY2xlYXInXV0sXG4gICAgICAgIFsnZm9udG5hbWUnLCBbJ2ZvbnRuYW1lJ11dLFxuICAgICAgICBbJ2ZvbnRzaXplJywgWydmb250c2l6ZSddXSxcbiAgICAgICAgWydjb2xvcicsIFsnY29sb3InXV0sXG4gICAgICAgIFsncGFyYScsIFsndWwnLCAnb2wnLCAncGFyYWdyYXBoJ11dLFxuICAgICAgICBbJ3RhYmxlJywgWyd0YWJsZSddXSxcbiAgICAgICAgWydpbnNlcnQnLCBbJ2xpbmsnLCAncGljdHVyZScsICd2aWRlbyddXSxcbiAgICAgICAgWyd2aWV3JywgWydmdWxsc2NyZWVuJywgJ2NvZGV2aWV3JywgJ2hlbHAnXV0sXG4gICAgXSxcbiAgICBwb3BvdmVyOiBmYWxzZSxcbiAgICBjYWxsYmFja3M6IHtcbiAgICAgICAgb25JbWFnZVVwbG9hZDogZnVuY3Rpb24oZmlsZXMpIHtcbiAgICAgICAgICAgIHVwbG9hZEltYWdlKGZpbGVzWzBdLCB0aGlzKTtcbiAgICAgICAgfVxuICAgIH0sXG59O1xuXG5tb2R1bGUuZXhwb3J0cyA9IHtcbiAgICBtb2R1bGU6IHtcbiAgICAgICAgcnVsZXM6IFtcbiAgICAgICAgICAgIHtcbiAgICAgICAgICAgICAgICAvLyBZb3UgY2FuIHVzZSBgcmVnZXhwYFxuICAgICAgICAgICAgICAgIC8vIHRlc3Q6IC92ZW5kb3JcXC5qcy8kXG4gICAgICAgICAgICAgICAgdGVzdDogL1xcLmNzcyQvLFxuICAgICAgICAgICAgICAgIGxvYWRlcjogJ2V4cG9ydHMtbG9hZGVyJyxcbiAgICAgICAgICAgICAgICB1c2U6IFsnc3R5bGUtbG9hZGVyJywgJ2Nzcy1sb2FkZXInXVxuICAgICAgICAgICAgICAgIC8vIG9wdGlvbnM6IHtcbiAgICAgICAgICAgICAgICAvLyAgICAgZXhwb3J0czogJ215RnVuY3Rpb24nLFxuICAgICAgICAgICAgICAgIC8vIH0sXG4gICAgICAgICAgICB9LFxuICAgICAgICBdLFxuICAgIH0sXG4gICAgdG9rZW46IHRva2VuLFxuICAgIHN1bW1lcm5vdGVfY29uZmlnOiBzdW1tZXJub3RlX2NvbmZpZ1xufTtcblxuIl0sImZpbGUiOiIuL3Jlc291cmNlcy9qcy9hcHAuanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/app.js\n");

/***/ }),

/***/ "./resources/js/language/list.js":
/*!***************************************!*\
  !*** ./resources/js/language/list.js ***!
  \***************************************/
/***/ (function(__unused_webpack_module, __unused_webpack_exports, __webpack_require__) {

eval("var _require = __webpack_require__(/*! ../app.js */ \"./resources/js/app.js\"),\n    token = _require.token;\n\n$('.update-status-lang-switcher').change(function () {\n  $.ajax({\n    method: 'POST',\n    url: this.dataset.url,\n    data: {\n      _token: token,\n      enabled: this.checked * 1\n    },\n    success: function success(data) {\n      console.log(data);\n      $(document).Toasts('create', {\n        \"class\": 'bg-primary',\n        title: 'Статус',\n        subtitle: 'OK',\n        body: data.message,\n        autohide: true,\n        delay: 2e3\n      });\n    }\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvbGFuZ3VhZ2UvbGlzdC5qcy5qcyIsIm1hcHBpbmdzIjoiQUFBQSxlQUFrQkEsbUJBQU8sQ0FBQyx3Q0FBRCxDQUF6QjtBQUFBLElBQVFDLEtBQVIsWUFBUUEsS0FBUjs7QUFFQUMsQ0FBQyxDQUFDLDhCQUFELENBQUQsQ0FBa0NDLE1BQWxDLENBQXlDLFlBQVk7QUFFakRELEVBQUFBLENBQUMsQ0FBQ0UsSUFBRixDQUFPO0FBQ0hDLElBQUFBLE1BQU0sRUFBRSxNQURMO0FBRUhDLElBQUFBLEdBQUcsRUFBRSxLQUFLQyxPQUFMLENBQWFELEdBRmY7QUFHSEUsSUFBQUEsSUFBSSxFQUFFO0FBQ0ZDLE1BQUFBLE1BQU0sRUFBRVIsS0FETjtBQUVGUyxNQUFBQSxPQUFPLEVBQUUsS0FBS0MsT0FBTCxHQUFlO0FBRnRCLEtBSEg7QUFPSEMsSUFBQUEsT0FBTyxFQUFFLGlCQUFBSixJQUFJLEVBQUk7QUFDYkssTUFBQUEsT0FBTyxDQUFDQyxHQUFSLENBQVlOLElBQVo7QUFDQU4sTUFBQUEsQ0FBQyxDQUFDYSxRQUFELENBQUQsQ0FBWUMsTUFBWixDQUFtQixRQUFuQixFQUE2QjtBQUN6QixpQkFBTyxZQURrQjtBQUV6QkMsUUFBQUEsS0FBSyxFQUFFLFFBRmtCO0FBR3pCQyxRQUFBQSxRQUFRLEVBQUUsSUFIZTtBQUl6QkMsUUFBQUEsSUFBSSxFQUFFWCxJQUFJLENBQUNZLE9BSmM7QUFLekJDLFFBQUFBLFFBQVEsRUFBRSxJQUxlO0FBTXpCQyxRQUFBQSxLQUFLLEVBQUU7QUFOa0IsT0FBN0I7QUFRSDtBQWpCRSxHQUFQO0FBbUJILENBckJEIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2pzL2xhbmd1YWdlL2xpc3QuanM/NDBjNSJdLCJzb3VyY2VzQ29udGVudCI6WyJjb25zdCB7IHRva2VuIH0gPSByZXF1aXJlKCcuLi9hcHAuanMnKVxuXG4kKCcudXBkYXRlLXN0YXR1cy1sYW5nLXN3aXRjaGVyJykuY2hhbmdlKGZ1bmN0aW9uICgpIHtcblxuICAgICQuYWpheCh7XG4gICAgICAgIG1ldGhvZDogJ1BPU1QnLFxuICAgICAgICB1cmw6IHRoaXMuZGF0YXNldC51cmwsXG4gICAgICAgIGRhdGE6IHtcbiAgICAgICAgICAgIF90b2tlbjogdG9rZW4sXG4gICAgICAgICAgICBlbmFibGVkOiB0aGlzLmNoZWNrZWQgKiAxLFxuICAgICAgICB9LFxuICAgICAgICBzdWNjZXNzOiBkYXRhID0+IHtcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKGRhdGEpO1xuICAgICAgICAgICAgJChkb2N1bWVudCkuVG9hc3RzKCdjcmVhdGUnLCB7XG4gICAgICAgICAgICAgICAgY2xhc3M6ICdiZy1wcmltYXJ5JyxcbiAgICAgICAgICAgICAgICB0aXRsZTogJ9Ch0YLQsNGC0YPRgScsXG4gICAgICAgICAgICAgICAgc3VidGl0bGU6ICdPSycsXG4gICAgICAgICAgICAgICAgYm9keTogZGF0YS5tZXNzYWdlLFxuICAgICAgICAgICAgICAgIGF1dG9oaWRlOiB0cnVlLFxuICAgICAgICAgICAgICAgIGRlbGF5OiAyZTMsXG4gICAgICAgICAgICB9KVxuICAgICAgICB9XG4gICAgfSlcbn0pIl0sIm5hbWVzIjpbInJlcXVpcmUiLCJ0b2tlbiIsIiQiLCJjaGFuZ2UiLCJhamF4IiwibWV0aG9kIiwidXJsIiwiZGF0YXNldCIsImRhdGEiLCJfdG9rZW4iLCJlbmFibGVkIiwiY2hlY2tlZCIsInN1Y2Nlc3MiLCJjb25zb2xlIiwibG9nIiwiZG9jdW1lbnQiLCJUb2FzdHMiLCJ0aXRsZSIsInN1YnRpdGxlIiwiYm9keSIsIm1lc3NhZ2UiLCJhdXRvaGlkZSIsImRlbGF5Il0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/language/list.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./resources/js/language/list.js");
/******/ 	
/******/ })()
;