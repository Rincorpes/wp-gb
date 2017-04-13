var $j = jQuery.noConflict();

$j(function(){

	/**
	 * gb Slider plugin
	 * version 1.0
	 */

	$j.fn.Slider = function(options)
	{
		var opt = {};

		this.each(function(){

			if (options) {
				$.extend(opt, options);
			}

			var container = $j(this);

			var Slider = function()
			{
				this.articles = container.find('article');
				this.articleList = (this.articles.length) - 1;
				this.prevLink = container.find('.slider-navbar').find('a.prev');
				this.nextLink = container.find('.slider-navbar').find('a.next');

				this.getCurrentIndex = function()
				{
					return this.articles.filter('.current').index();
				};

				this.go = function(index)
				{
					this.articles
						.removeClass('current')
						.fadeOut()
						.eq(index)
						.fadeIn()
						.addClass('current');
				};

				this.next = function()
				{
					var index = this.getCurrentIndex();
					if (index < this.articleList) {
						this.go(index + 1);
					} else {
						this.go(0);
					}
				};

				this.prev = function()
				{
					var index = this.getCurrentIndex();
					if (index > 0) {
						this.go(index - 1);
					} else {
						this.go(this.articleList);
					}
				};

				this.init = function()
				{
					this.articles.hide().first().addClass('current').show();
				};
			};

			var slider = new Slider();
			slider.init();

			slider.nextLink.on('click', function(e){
				e.preventDefault();
				slider.next();
			});

			slider.prevLink.on('click', function(e){
				e.preventDefault();
				slider.prev();
			});
		}); 
	}

	$j("#gb-slider").Slider();
});