fetch('videos.php')
  .then(response => response.json())
  .then(data => {
    const videoContainer = document.querySelector('#video-container');
    data.forEach(video => {
      const videoElement = document.createElement('video');
      videoElement.controls = true;
      const sourceElement = document.createElement('source');
      sourceElement.src = 'videos/' + video;
      sourceElement.type = 'video/mp4';
      videoElement.appendChild(sourceElement);
      videoContainer.appendChild(videoElement);
    });
  });
