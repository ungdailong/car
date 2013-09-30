
// BORDER //


curvyCorners.addEvent(window, 'load', initCorners);

  function initCorners() {
    var settings = {
      tl: { radius: 5 },
      tr: { radius: 5 },
      bl: { radius: 5 },
      br: { radius: 5 },
      antiAlias: true
    }
    curvyCorners(settings, ".boxAll, .boxSearchR, .boxSP, .listNavRi li a, .tabPoll");
  }
  
  
curvyCorners.addEvent(window, 'load', initCornersTop);

  function initCornersTop() {
    var settings = {
      tl: { radius: 5 },
      tr: { radius: 5 },
      bl: { radius: 0 },
      br: { radius: 0 },
      antiAlias: true
    }
    curvyCorners(settings, "#blogEvent .colRight");
  }  

// SLIDE //
