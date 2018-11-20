"use strict";

var slider = function slider(_ref) {
  var images = _ref.images,
      images2 = _ref.images2,
      content = _ref.content;

  //
  /* Makes Divs */
  var makeDiv = function makeDiv() {
    return document.createElement("div");
  };

  /* Make Images from image array */
  var makeImgs = function makeImgs(images) {
    return images.map(function (img) {
      return "<img class=\"img\" src=" + img + " />";
    }).join("");
  };

  var imgContainer = makeDiv();

  imgContainer.classList.add("imgContainer");

  imgContainer.innerHTML = makeImgs(images);

  var imgContainer2 = makeDiv();

  imgContainer2.classList.add("imgContainer");

  imgContainer2.innerHTML = makeImgs(images2);

  var leftSVG = function leftSVG() {
    return "<svg width=\"13px\" height=\"13px\" viewBox=\"0 0 13 13\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns: xlink=\"http://www.w3.org/1999/xlink\">\n              <g id=\"Page-1\" stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\n                <g id=\"Homepage\" transform=\"translate(-754.000000, -614.000000)\" fill=\"#333333\">\n                    <path d=\"M760.664048,626.710936 C760.591131,626.765623 760.5091,626.792967 760.417954,626.792967 C760.326809,626.792967 760.253892,626.765623 760.199205,626.710936 L754.484375,620.968762 C754.411458,620.914075 754.375,620.841158 754.375,620.750013 C754.375,620.658867 754.411458,620.58595 754.484375,620.531263 L760.199205,614.789089 C760.253892,614.734402 760.326809,614.707058 760.417954,614.707058 C760.5091,614.707058 760.591131,614.734402 760.664048,614.789089 L761.210921,615.335963 C761.265609,615.39065 761.292952,615.463567 761.292952,615.554712 C761.292952,615.645858 761.265609,615.727889 761.210921,615.800806 L756.97265,620.039077 L766.296847,620.039077 C766.387992,620.039077 766.465466,620.070978 766.529268,620.13478 C766.59307,620.198581 766.624971,620.276055 766.624971,620.367201 L766.624971,621.132824 C766.624971,621.22397 766.59307,621.301444 766.529268,621.365245 C766.465466,621.429047 766.387992,621.460948 766.296847,621.460948 L756.97265,621.460948 L761.210921,625.699219 C761.265609,625.772136 761.292952,625.854167 761.292952,625.945313 C761.292952,626.036458 761.265609,626.109375 761.210921,626.164062 L760.664048,626.710936 Z\" id=\"arrow-left\"></path>\n                  </g>\n                </g>\n            </svg>";
  };

  var rightSVG = function rightSVG() {
    return "<svg width=\"13px\" height=\"13px\" viewBox=\"0 0 13 13\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">\n                <g id=\"Page-1\" stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\n                    <g id=\"Homepage\" transform=\"translate(-804.000000, -615.000000)\" fill=\"#333333\">\n                        <path d=\"M810.335923,615.789089 C810.40884,615.734402 810.490871,615.707058 810.582016,615.707058 C810.673162,615.707058 810.746079,615.734402 810.800766,615.789089 L816.515596,621.531263 C816.588513,621.58595 816.624971,621.658867 816.624971,621.750013 C816.624971,621.841158 816.588513,621.914075 816.515596,621.968762 L810.800766,627.710936 C810.746079,627.765623 810.673162,627.792967 810.582016,627.792967 C810.490871,627.792967 810.40884,627.765623 810.335923,627.710936 L809.78905,627.164062 C809.734362,627.109375 809.707019,627.036458 809.707019,626.945313 C809.707019,626.854167 809.734362,626.772136 809.78905,626.699219 L814.027321,622.460948 L804.703124,622.460948 C804.611979,622.460948 804.534505,622.429047 804.470703,622.365245 C804.406901,622.301444 804.375,622.22397 804.375,622.132824 L804.375,621.367201 C804.375,621.276055 804.406901,621.198581 804.470703,621.13478 C804.534505,621.070978 804.611979,621.039077 804.703124,621.039077 L814.027321,621.039077 L809.78905,616.800806 C809.734362,616.727889 809.707019,616.645858 809.707019,616.554712 C809.707019,616.463567 809.734362,616.39065 809.78905,616.335963 L810.335923,615.789089 Z\" id=\"arrow-right\"></path>\n                    </g>\n                </g>\n            </svg>";
  };

  var makeContent = function makeContent(_ref2) {
    var content = _ref2.content,
        index = _ref2.index;

    var b = makeDiv();
    b.classList.add("slide");
    b.id = "contentslide--" + index;
    b.innerHTML = content;
    return b;
  };

  var contentContainer = makeDiv();

  contentContainer.classList.add("contentContainer");

  contentContainer.classList.add("col-md-6");

  content.forEach(function (content, index) {
    return contentContainer.appendChild(makeContent({ content: content, index: index }));
  });

  /* Creates Controls */

  // REQUIRES CLEAN-UP

  var makeControls = function makeControls() {
    var controlContainer = makeDiv();
    controlContainer.classList.add("controlContainer");

    var leftControl = makeDiv();
    leftControl.classList.add("button");
    leftControl.classList.add("leftControl");
    leftControl.innerHTML = leftSVG();

    var rightControl = makeDiv();
    rightControl.classList.add("button");
    rightControl.classList.add("rightControl");
    rightControl.innerHTML = rightSVG();

    controlContainer.appendChild(leftControl);
    controlContainer.appendChild(rightControl);

    return controlContainer;
  };

  /* Create Output and imgs and return */

  var output = makeDiv();

  output.classList.add("slidercontainer");

  imgContainer.classList.add("imgContainer--1");

  imgContainer.classList.add("col-md-4");


  output.appendChild(imgContainer);

  imgContainer2.classList.add("imgContainer--2");

  imgContainer2.classList.add("col-md-4");


  output.appendChild(imgContainer2);

  output.appendChild(makeControls());

  output.appendChild(contentContainer);

  return output;
};

var init = function init() {
  var slides = Array.from(document.querySelector(".contentContainer").children);

  var imgs1 = Array.from(document.querySelector(".imgContainer--1").children);
  var imgs2 = Array.from(document.querySelector(".imgContainer--2").children);

  var index = 0;

  slides[index].classList.add("active");
  imgs1[index].classList.add("active");
  imgs2[index].classList.add("active");

  var slideForwards = function slideForwards(index, array) {
    return index + 1 >= array.length ? 0 : index + 1;
  };

  var slideBackwards = function slideBackwards(index, array) {
    return index >= 1 ? index - 1 : array.length - 1;
  };

  document.querySelector(".leftControl").addEventListener("click", function () {
    index = slideBackwards(index, imgs1);

    slides.map(function (slide) {
      return slide.classList.remove("active");
    });
    imgs1.map(function (slide) {
      return slide.classList.remove("active");
    });
    imgs2.map(function (slide) {
      return slide.classList.remove("active");
    });

    slides[index].classList.add("active");
    imgs1[index].classList.add("active");
    imgs2[index].classList.add("active");
  });

  document.querySelector(".rightControl").addEventListener("click", function () {
    index = slideForwards(index, imgs1);

    slides.map(function (slide) {
      return slide.classList.remove("active");
    });
    imgs1.map(function (slide) {
      return slide.classList.remove("active");
    });
    imgs2.map(function (slide) {
      return slide.classList.remove("active");
    });

    slides[index].classList.add("active");
    imgs1[index].classList.add("active");
    imgs2[index].classList.add("active");
  });
};