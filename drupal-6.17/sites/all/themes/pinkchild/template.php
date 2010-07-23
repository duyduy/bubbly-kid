<?php
// $Id: template.php,v 1.21 2009/08/12 04:25:15 johnalbin Exp $

/**
 * @file
 * Contains theme override functions and preprocess functions for the theme.
 *
 * ABOUT THE TEMPLATE.PHP FILE
 *
 *   The template.php file is one of the most useful files when creating or
 *   modifying Drupal themes. You can add new regions for block content, modify
 *   or override Drupal's theme functions, intercept or make additional
 *   variables available to your theme, and create custom PHP logic. For more
 *   information, please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/theme-guide
 *
 * OVERRIDING THEME FUNCTIONS
 *
 *   The Drupal theme system uses special theme functions to generate HTML
 *   output automatically. Often we wish to customize this HTML output. To do
 *   this, we have to override the theme function. You have to first find the
 *   theme function that generates the output, and then "catch" it and modify it
 *   here. The easiest way to do it is to copy the original function in its
 *   entirety and paste it here, changing the prefix from theme_ to pinkchild_.
 *   For example:
 *
 *     original: theme_breadcrumb()
 *     theme override: pinkchild_breadcrumb()
 *
 *   where pinkchild is the name of your sub-theme. For example, the
 *   zen_classic theme would define a zen_classic_breadcrumb() function.
 *
 *   If you would like to override any of the theme functions used in Zen core,
 *   you should first look at how Zen core implements those functions:
 *     theme_breadcrumbs()      in zen/template.php
 *     theme_menu_item_link()   in zen/template.php
 *     theme_menu_local_tasks() in zen/template.php
 *
 *   For more information, please visit the Theme Developer's Guide on
 *   Drupal.org: http://drupal.org/node/173880
 *
 * CREATE OR MODIFY VARIABLES FOR YOUR THEME
 *
 *   Each tpl.php template file has several variables which hold various pieces
 *   of content. You can modify those variables (or add new ones) before they
 *   are used in the template files by using preprocess functions.
 *
 *   This makes THEME_preprocess_HOOK() functions the most powerful functions
 *   available to themers.
 *
 *   It works by having one preprocess function for each template file or its
 *   derivatives (called template suggestions). For example:
 *     THEME_preprocess_page    alters the variables for page.tpl.php
 *     THEME_preprocess_node    alters the variables for node.tpl.php or
 *                              for node-forum.tpl.php
 *     THEME_preprocess_comment alters the variables for comment.tpl.php
 *     THEME_preprocess_block   alters the variables for block.tpl.php
 *
 *   For more information on preprocess functions and template suggestions,
 *   please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/node/223440
 *   and http://drupal.org/node/190815#template-suggestions
 */


/**
 * Implementation of HOOK_theme().
 */
function pinkchild_theme(&$existing, $type, $theme, $path) {
  $hooks = zen_theme($existing, $type, $theme, $path);
  // Add your theme hooks like this:
  /*
  $hooks['hook_name_here'] = array( // Details go here );
  */
  // @TODO: Needs detailed comments. Patches welcome!
  return $hooks;
}

/**
 * Override or insert variables into all templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered (name of the .tpl.php file.)
 */
/* -- Delete this line if you want to use this function
function pinkchild_preprocess(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
 
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
//* -- Delete this line if you want to use this function
function pinkchild_preprocess_page(&$vars, $hook) {
	if ($vars['node']->type == 'product') {    
		drupal_add_js(drupal_get_path('theme', 'pinkchild') . '/js/cloud-zoom.1.0.2/cloud-zoom.1.0.2.min.js', 'theme');	
		drupal_add_css(drupal_get_path('theme', 'pinkchild') . '/js/cloud-zoom.1.0.2/cloud-zoom.css', 'theme');
        
        drupal_add_js(drupal_get_path('theme', 'pinkchild') . '/js/ui-jquery/jquery-ui-1.7.3.custom.min.js', 'theme');    
        drupal_add_css(drupal_get_path('theme', 'pinkchild') . '/js/ui-jquery/css/flick/jquery-ui-1.7.3.custom.css', 'theme'); 
       
         drupal_add_js('$(function(){$(\'#tabs\').tabs();});', 'inline');
		$vars['css'] = drupal_add_css();
		$vars['styles'] = drupal_get_css();
	}
	
	if (in_array('page-catalog',$vars['template_files'])){
		$vars['title_enable']= true;	
	}else{$vars['title_enable']= false;}  

	if (in_array('page-front',$vars['template_files'])){
		drupal_add_js(drupal_get_path('theme', 'pinkchild') . '/js/cu3er-v0.9.2/js/swfobject/swfobject.js', 'theme');	
		
	}
    $variables['scripts'] = drupal_get_js(); 
	//var_dump($vars['template_files']);
    //var_dump($vars);
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function pinkchild_preprocess_node(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // pinkchild_preprocess_node_page() or pinkchild_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $vars['node']->type;
  if (function_exists($function)) {
    $function($vars, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function pinkchild_preprocess_comment(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
//* -- Delete this line if you want to use this function
function pinkchild_preprocess_block(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
  //var_dump($vars);
}
// */
function pinkchild_uc_catalog_product_grid($products) {
  
  $product_table = '<ul class="product_list">';
  $count = 1;
  $context = array(
    'revision' => 'themed',
    'type' => 'product',
  );
  foreach ($products as $nid) {
    $product = node_load($nid);
    $context['subject'] = array('node' => $product);
    switch ($count){
        case 1:
        case 2:
                  $product_table .= "<li class=\"p-first\"><div class=\"product \">";
                  break;
        case 3:
                  $product_table .= "<li class=\"p-first p-last\"><div class=\"product \">";
                  break;
        default:
                if ($count % variable_get('uc_catalog_grid_display_width', 3) == 0) {
                    $product_table .= "<li class=\"p-last\"><div class=\"product \">"; 
                }else{
                    $product_table .= "<li><div class=\"product \">";    
                }        
    }  
            


    $titlelink = l($product->title, "node/$nid", array('html' => TRUE));
    if (module_exists('imagecache') && ($field = variable_get('uc_image_'. $product->type, '')) && isset($product->$field) && file_exists($product->{$field}[0]['filepath'])) {
      $imagelink = l(theme('imagecache', 'product_list', $product->{$field}[0]['filepath'], $product->title, $product->title), "node/$nid", array('html' => TRUE));
    }
    else {
      $imagelink = '';
    }

    $product_table .= '<div class="thumb">'. $imagelink .'</div>'; 
    if (variable_get('uc_catalog_grid_display_title', TRUE)) {
      $product_table .= '<div class="title">'. $titlelink .'</div>';
    }
    
    $product_table .="<div class=\"bottom\">";
    if (variable_get('uc_catalog_grid_display_model', TRUE)) {
      $product_table .= '<span class="catalog-grid-ref">'. $product->model .'</span>';
    }
    
    if (variable_get('uc_catalog_grid_display_sell_price', TRUE)) {
      $product_table .='<div class="tag"><img width="16" height="16" alt="tag"  src="'.url(drupal_get_path('theme', 'pinkchild').'/images/icon_tag.gif').'"/></div>';
      $product_table .= '<div class="price">'. uc_price($product->sell_price, $context) .'</div>';
    }
    if (module_exists('uc_cart') && variable_get('uc_catalog_grid_display_add_to_cart', TRUE)) {
      if (variable_get('uc_catalog_grid_display_attributes', TRUE)) {
        $product_table .= theme('uc_product_add_to_cart', $product);
      }
      else {
        $product_table .= drupal_get_form('uc_catalog_buy_it_now_form_'. $product->nid, $product);
      }
    }
    $product_table .= '</div></div></li>';

    $count++;
  }
  $product_table .= "</ul>";
  return $product_table;
}

function pinkchild_uc_product_image($images, $teaser = 0, $page = 0) {

  static $rel_count = 0;

  // Get the current product image widget.
  $image_widget = uc_product_get_image_widget();
  $image_widget_func = $image_widget['callback'];
  
  //$first = array_shift($images);
  $first   = $images[0];
  $output = '<div class="left"><div >';
  $output .= '<a href="'. imagecache_create_url('product_full', $first['filepath']) .'" title="'. $first['data']['title'] .'"';
  if ($image_widget) {
    $output .= $image_widget_func($rel_count);
  }
  $output .= ' class = "cloud-zoom" id="zoom1" rel="adjustX: 0, adjustY:0 ">'; 
  $output .= theme('imagecache', 'product', $first['filepath'], $first['alt'], $first['title']);
  $output .= '</a></div><ul class="small_thumb">';

  foreach ($images as $thumbnail) {
    // Node preview adds extra values to $images that aren't files.
    if (!is_array($thumbnail) || empty($thumbnail['filepath'])) {
      continue;
    }
    $output .= '<li><a href="'. imagecache_create_url('product_full', $thumbnail['filepath']) .'" title="'. $thumbnail['data']['title'] .'"';
    if ($image_widget) {
      $output .= $image_widget_func($rel_count);
    }
    $output .= 'rel="useZoom: \'zoom1\', smallImage: \''. imagecache_create_url('product', $thumbnail['filepath']).'\' " class="cloud-zoom-gallery">';
    $output .= theme('imagecache', 'uc_thumbnail', $thumbnail['filepath'], $thumbnail['alt'], $thumbnail['title'],array('class'=>'zoom-tiny-image'));
    $output .= '</a></li>';
  }
  $output .= '</ul></div>';
  $rel_count++;

  return $output;
}

function pinkchild_uc_product_model($model, $teaser = 0, $page = 0) {
  $output = '<p><strong>';
  $output .= t('Code: @sku', array('@sku' => $model));
  $output .= '</strong></p>';
  return $output;
}
function pinkchild_uc_product_body($body, $teaser = 0, $page = 0) {
  $output = '<p>';
  $output .= $body;
  $output .='</p>';
  return $output;
}
function pinkchild_uc_product_price($price, $context, $options = array()) {
  $output = '<div id="product_cart"><div class="price"><div class="text-price" >Price:</div>';
  $output .= uc_price($price, $context, $options);
  $output .= '</div></div>';

  return $output;
}
function pinkchild_uc_attribute_add_to_cart($form) {
  $output = '<div id="product_options" class="attributes">';
  $stripes = array('even' => 'odd', 'odd' => 'even');
  $parity = 'even';
  foreach (element_children($form) as $aid) {
    $parity = $stripes[$parity];
    $classes = array('attribute', 'attribute-'. $aid, $parity);
    $output .= '<div class="'. implode(' ', $classes) .'">';
    $output .= drupal_render($form[$aid]);
    $output .= '</div>';
  }

  $output .= drupal_render($form) .'</div>';

  return $output;
}
function pinkchild_uc_cart_block_content($help_text, $items, $item_count, $item_text, $total, $summary_links) {
  $output = '';

  // Add the help text if enabled.
  if ($help_text) {
    $output .= '<span class="cart-help-text">'. $help_text .'</span>';
  }

  // Add a wrapper div for use when collapsing the block.
  $output .= '<div id="cart-block-contents">';

  // Add a table of items in the cart or the empty message.
  $output .= theme('uc_cart_block_items', $items);

  $output .= '</div>';

  // Add the summary section beneath the items table.
  $output .= theme('uc_cart_block_summary', $item_count, $item_text, $total, $summary_links);

  return $output;
}
function pinkchild_uc_cart_block_summary($item_count, $item_text, $total, $summary_links) {
  $context = array(
    'revision' => 'themed-original',
    'type' => 'amount',
  );
  // Build the basic table with the number of items in the cart and total.
  /*$output = '<table class="cart-block-summary"><tbody><tr>'
           .'<td class="cart-block-summary-items">'. $item_text .'</td>'
           .'<td class="cart-block-summary-total"><label>'. t('Total:')
           .'</label> '. uc_price($total, $context) .'</td></tr>';
  */
  // If there are products in the cart...
  if ($item_count > 0) {
    // Add a view cart link.
   /* $output .= '<tr class="cart-block-summary-links"><td colspan="2">'
             . theme('links', $summary_links) .'</td></tr>';*/
  }

  //$output .= '</tbody></table>';
  $output .=$item_text;
  return $output;
}
function  pinkchild_uc_cart_block_title($title, $icon_class = 'cart-empty', $collapsible = TRUE) {
  $output = '';

  // Add in the cart image if specified.
  if ($icon_class) {
    $output .= theme('uc_cart_block_title_icon', $icon_class);
  }

  // Add the main title span and text, with or without the arrow based on the
  // cart block collapsibility settings.
  if ($collapsible) {
    $output .= '<span class="cart-block-title-bar" title="'. t('Show/hide shopping cart contents.') .'">'. $title .'<span class="cart-block-arrow"></span></span>';
  }
  else {
    $output .= '<span class="cart-block-title-bar">'. $title .'</span>';
  }
  
  return $output;
}

function pinkchild_uc_catalog_block($menu_tree) {
  $output = '<ul >';
  
  foreach ($menu_tree->children as $branch) {
    list($inpath, $html) = _uc_catalog_navigation($branch);
    $output .= $html.'<li style="font-size:26px;">|</li>';
  }
  $output = rtrim($output,'<li style="font-size:26px;">|</li>') ;
  $output .= '</ul>';

  return $output;
}
