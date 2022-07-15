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

/***/ "./resources/sass/admin.scss":
/*!***********************************!*\
  !*** ./resources/sass/admin.scss ***!
  \***********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvc2Fzcy9hZG1pbi5zY3NzLmpzIiwibWFwcGluZ3MiOiI7QUFBQSIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9zYXNzL2FkbWluLnNjc3M/M2RlZSJdLCJzb3VyY2VzQ29udGVudCI6WyIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW5cbmV4cG9ydCB7fTsiXSwibmFtZXMiOltdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/sass/admin.scss\n");

/***/ }),

/***/ "./resources/sass/main.scss":
/*!**********************************!*\
  !*** ./resources/sass/main.scss ***!
  \**********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvc2Fzcy9tYWluLnNjc3MuanMiLCJtYXBwaW5ncyI6IjtBQUFBIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL3Nhc3MvbWFpbi5zY3NzP2M0ZjIiXSwic291cmNlc0NvbnRlbnQiOlsiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luXG5leHBvcnQge307Il0sIm5hbWVzIjpbXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/sass/main.scss\n");

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
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	!function() {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = function(result, chunkIds, fn, priority) {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var chunkIds = deferred[i][0];
/******/ 				var fn = deferred[i][1];
/******/ 				var priority = deferred[i][2];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every(function(key) { return __webpack_require__.O[key](chunkIds[j]); })) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	!function() {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/style": 0,
/******/ 			"css/admin": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = function(chunkId) { return installedChunks[chunkId] === 0; };
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = function(parentChunkLoadingFunction, data) {
/******/ 			var chunkIds = data[0];
/******/ 			var moreModules = data[1];
/******/ 			var runtime = data[2];
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some(function(id) { return installedChunks[id] !== 0; })) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkIds[i]] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	}();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/style","css/admin"], function() { return __webpack_require__("./resources/js/app.js"); })
/******/ 	__webpack_require__.O(undefined, ["css/style","css/admin"], function() { return __webpack_require__("./resources/sass/admin.scss"); })
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/style","css/admin"], function() { return __webpack_require__("./resources/sass/main.scss"); })
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;