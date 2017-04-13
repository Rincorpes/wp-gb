<?php
/**
 * Loads ads
 */
class GbAd
{
	/**
	 * Saves the position for the ad
	 *
	 * @var string
	 */
	private $_position;
	/**
	 * Saves the ad type
	 *
	 * @var string
	 */
	private $_type;
	/**
	 * Saves the ad content if it exists
	 *
	 * @var string
	 */
	private $_ad;

	/**
	 * the class constructor
	 *
	 * @param $position string Position for the ad
	 * @param $type string Ad type
	 */
	function __construct($position, $type, $ad = null)
	{
		$this->_position = $position;
		$this->_type = $type;
		$this->_ad = $ad;

		$this->loadAd();
	}

	private function loadAd()
	{
		if (!$opt = $this->getAdPosition()) {
			echo '<p class="alert alert-danger"><strong>Error:</strong> el anuncio "' . $this->_name . '" no está registrado.</p>';
			return;
		}

		$position = $this->_position;
		$type = $this->_type;

		$element = (array_key_exists('element', $opt)) ? $opt['element'] : 'div';

		$pull = (array_key_exists('pull', $opt)) ? ' pull-' . $opt['pull'] : '';

		$aClass = (array_key_exists('additional-class', $opt)) ? ' ' . $opt['additional-class'] : '';
		$cClass = 'class="' . $position . '-advertise' . $pull . $aClass . '"';

		$oTag = '<' . $element . ' ' . $cClass . '>';
		$cTag = '</' . $element . '>';

		$adClass = $this->getAdClass();
		$adClass = (array_key_exists('centered', $opt)) ? 'class="' . $adClass . ' center-block"' : 'class="' . $adClass . '"';

		$ad = $this->getAd();

		echo $oTag;
		echo '<div ' . $adClass . '>' . $ad . '</div>';
		echo $cTag;
	}
	/**
	 * Gets ad position and its configs
	 *
	 * @return array If position exists returns ad configs
	 */
	private function getAdPosition()
	{
		$positions = array(
			'header' => array(
				'pull' => 'right',
				),
			'main' => array(
				'additional-class' => 'hidden-xs',
				'centered' => true
				),
			'sidebar' => array(
				'centered' => true
				),
			'footer' => array(
				'centered' => true
				),
			);

		return $positions[$this->_position];
	}
	/**
	 * Gets ad class
	 * 
	 * @return string The name of the ad class
	 */
	private function getAdClass() {

		$class = 'ad-';

		switch ($this->_type) {
			case 'square' :
				$class = $class . '300x250';
				break;
			case 'horizontal' :
				$class = $class . '728x90';
				break;
			case 'vertical' :
				$class = $class . '300x600';
				break;
		}

		return $class;
	}
	/**
	 * Gets the ad content
	 */
	private function getAd()
	{
		if (!$this->_ad) {
			return 'Contactanos para anunciarte en este espacio.';
		} else {
			switch ($this->_type) {
				case 'square':
					$adName = '300x250';
					break;
				case 'horizontal':
					$adName = '728x90';
					break;
				case 'vertical':
					$adName = '300x600';
					break;
			}

			if ($this->_ad === 'chitika') {
				$adPrefix = 'chitika-';
			} else if ($this->_ad === 'adsense') {
				$adPrefix = 'adsense-';
			}

			$adPath = __DIR__ . '/ads/' . $adPrefix . $adName . '.php';

			if (file_exists($adPath)) {
				ob_start();
				include $adPath;
				$ad = ob_get_contents();
				ob_end_clean();

				return $ad;
			}
		}
	}
}

/**
 * Loads ads
 */
if (!function_exists('gb_get_ad')) :
	function gb_get_ad($position, $type, $ad = null)
	{
		$ad = new GbAd($position, $type, $ad);
	}
endif;
?>