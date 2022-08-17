<?php
	// 
	defined('_JEXEC') or die;
	
	// 
	// 
	use Joomla\CMS\Plugin\CMSPlugin;
	
	
	/**
	 *
	 */
	class plgJShoppingAdminWishBoxAdminMUImages extends CMSPlugin
	{
		/**
		 *
		 */
		public $title = null;
		/**
		 *
		 */
		protected $autoloadLanguage = true;
		
		
		/**
		 *
		 */
		public function __construct(&$subject, $config)
		{
			// 
			// 
			parent::__construct($subject, $config);
			// 
			// 
			$this->title = 'PLG_'.$config['type'].'_'.$config['name'];
		}
		
		
		/**
		 *
		 */
		public function onBeforeDisplayEditProductView(&$view)
		{
			// 
			// 
			$document = JFactory::getDocument();
			// 
			// 
			$jshopConfig = JSFactory::getConfig();
			// 
			// 
			$document->addScriptDeclaration('var wishboxadminmuimages_product_image_upload_count = \''.$jshopConfig->product_image_upload_count.'\'');
			// 
			// 
			JHtml::script('plg_jshoppingadmin_wishboxadminmuimages/script.js', ['framework' => true, 'relative' => true]);
		}
		
		
		/**
		 *
		 */
		public function onAfterSaveProduct(&$product)
		{
			// 
			$count = count($_FILES['wishbox_product_images']['name']);
			// 
			for ($i = 0; $i < $count; $i++)
			{
				// 
				$_FILES['product_image_'.$i] = [
													'name' => $_FILES['wishbox_product_images']['name'][$i],
													'type' => $_FILES['wishbox_product_images']['type'][$i],
													'tmp_name' => $_FILES['wishbox_product_images']['tmp_name'][$i],
													'error' => $_FILES['wishbox_product_images']['error'][$i],
													'size' => $_FILES['wishbox_product_images']['size'][$i]
												];
			}
			// 
			unset($_FILES['wishbox_product_images']);
		}
	}