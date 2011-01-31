<div id="twitter_div">
<script src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 5,
  interval: 5000,
  width: 'auto',
  height: 300,
  theme: {
    shell: {
      background: '#aca492',
      color: '#665544'
    },
    tweets: {
      background: '#ccc3af',
      color: '#665544',
      links: '#ffffff'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: true,
    hashtags: true,
    timestamp: true,
    avatars: false,
    behavior: 'all'
  }
}).render().setUser('mrubinsk').start();
</script>
</script>
</div>