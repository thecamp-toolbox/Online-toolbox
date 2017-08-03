var pluginEmbedLoadLazyVideo = function() {
  var wrapper = this.parentNode;
  var embed   = wrapper.children[0];
  embed.src = embed.dataset.src;
  wrapper.removeChild(this);
};

document.addEventListener("DOMContentLoaded", function(event) {
  var thumb = document.getElementsByClassName('embed__thumb');

  for (var i = 0; i < thumb.length; i++) {
    thumb[i].addEventListener('click', pluginEmbedLoadLazyVideo, false);
  }
});
