<?php
/**
 * Nodes Helper
 *
 * PHP version 5
 *
 * @category Helper
 * @package  Croogo.Nodes
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class Nodes2Helper extends NodesHelper {

/**
 * Other helpers used by this helper
 *
 * @var array
 * @access public
 */
	public $helpers = array(
		'Html',
		'Form',
		'Session',
		'Js',
		'Croogo.Layout',
	);

/**
 * Current Node
 *
 * @var array
 * @access public
 */
	public $node = null;

/**
 * constructor
 */
	public function __construct(View $view, $settings = array()) {
		parent::__construct($view);
		$this->_setupEvents();
	}

/**
 * setup events
 */
	protected function _setupEvents() {
		$events = array(
			'Helper.Layout.beforeFilter' => array(
				'callable' => 'filter', 'passParams' => true,
			),
		);
		$eventManager = $this->_View->getEventManager();
		foreach ($events as $name => $config) {
			$eventManager->attach(array($this, 'filter'), $name, $config);
		}
	}

/**
 * Set current Node
 *
 * @param array $node
 * @return void
 */
	public function set($node) {
		$this->node = $node;
		$this->Layout->hook('afterSetNode');
	}

/**
 * Get value of a Node field
 *
 * @param string $field
 * @return string
 */
	public function field($field = 'id', $value = null) {
		$model = 'Node';
		if (strstr($field, '.')) {
			list($model, $field) = explode('.', $field);
		}

		if ($field && $value) {
			$this->node[$model][$field] = $value;
		} elseif (isset($this->node[$model][$field])) {
			return $this->node[$model][$field];
		} else {
			return false;
		}
	}

/**
 * Show nodes Product
 *
 * @param string $alias Node query alias
 * @param array $options (optional)
 * @return string
 */
	public function product( $options = array() ) {
		$_options = array(
			'element' => 'Nodes.node_product',
		);
		$options = array_merge($_options, $options);

		$attachments	= $this->node['Nodeattachment'];	// image
		$fields			= $this->node['CustomFields'];		// price, portion and more

		$output = '';

		$output = $this->Layout->hook('beforeNodeInfo');
		$output .= $this->_View->element($options['element'], compact('attachments','fields'));
		$output .= $this->Layout->hook('afterNodeInfo');
		return $output;
	}

}
