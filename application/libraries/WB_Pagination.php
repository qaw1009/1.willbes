<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WB_Pagination extends CI_Pagination
{
	protected $display_always			= false; // Display pagination even it has one page only.
    protected $use_fixed_page		= true; // Use a fixed number of pages.
    protected $fixed_page_num		= 10; // A fixed number of pages on the pagination.
    protected $disable_first_link		= false; // Disable the first link when the current page is the first page.
    protected $disable_last_link		= false; // Disable the last link when the current page is the last page.
    protected $disable_prev_link		= false; // Disable the previous link when the current page is the first page.
    protected $disable_next_link		= false; // Disable the next link when the current page is the last page.
    protected $display_first_always	= true; // Always display the first link even the current page is the first page.
    protected $display_last_always	= true; // Always display the last link even the current page is the last page.
    protected $display_prev_always	= true; // Always display the previous link even the current page is the first page.
    protected $display_next_always	= true; // Always display the next link even the current page is the last page.

    protected $disabled_first_tag_open	    = '';
    protected $disabled_first_tag_close	    = '&nbsp;';
    protected $disabled_last_tag_open	    = '&nbsp;';
    protected $disabled_last_tag_close	    = '';
    protected $disabled_prev_tag_open	    = '&nbsp;';
    protected $disabled_prev_tag_close	= '';
    protected $disabled_next_tag_open	    = '&nbsp;';
    protected $disabled_next_tag_close	= '&nbsp;';

    protected $use_page_numbers = true;
    protected $use_first_page_number = false;
    protected $anchor_class = '';

	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Generate the pagination links
	 *
	 * @access	public
	 * @return	string
	 */
	function create_links()
	{
		// If our item count or per-page total is zero there is no need to continue.
		if ($this->total_rows == 0 || $this->per_page == 0) {
			return '';
		}

		// Calculate the total number of pages
		$num_pages = ceil($this->total_rows / $this->per_page);

		// Set the base page index for starting page number
		if ($this->use_page_numbers) {
			$base_page = 1;
		} else {
			$base_page = 0;
		}

        // Is there only one page? Hm... nothing more to do here then.
        if ($this->display_always === false && $num_pages == 1) {
            $this->cur_page = $base_page;
            return '';
        }

		// Set the first page number
        $first_page = '';
		if ($this->use_first_page_number === true) {
            $first_page = $base_page;
        }

		// Determine the current page number.
		$CI =& get_instance();

		if ($CI->config->item('enable_query_strings') === true || $this->page_query_string === true) {
			if ($CI->input->get($this->query_string_segment) != $base_page) {
				$this->cur_page = $CI->input->get($this->query_string_segment);

				// Prep the current page - no funny business!
				$this->cur_page = (int) $this->cur_page;
			}
		} else {
			if ($CI->uri->segment($this->uri_segment) != $base_page) {
				$this->cur_page = $CI->uri->segment($this->uri_segment);

				// Prep the current page - no funny business!
				$this->cur_page = (int) $this->cur_page;
			}
		}

		// Set current page to 1 if using page numbers instead of offset
		if ($this->use_page_numbers && $this->cur_page == 0) {
			$this->cur_page = $base_page;
		}

		$this->num_links = (int)$this->num_links;

		if ($this->num_links < 1) {
			show_error('Your number of links must be a positive number.');
		}

		if ( ! is_numeric($this->cur_page)) {
			$this->cur_page = $base_page;
		}

		// Is the page number beyond the result range?
		// If so we show the last page
		if ($this->use_page_numbers) {
			if ($this->cur_page > $num_pages) {
				$this->cur_page = $num_pages;
			}
		} else {
			if ($this->cur_page > $this->total_rows) {
				$this->cur_page = ($num_pages - 1) * $this->per_page;
			}
		}

		$uri_page_number = $this->cur_page;

		if ( ! $this->use_page_numbers) {
			$this->cur_page = floor(($this->cur_page/$this->per_page) + 1);
		}

		// Calculate the start and end numbers. These determine
		// which number to start and end the digit links with
		if ($this->use_fixed_page) {
			$start = (ceil($this->cur_page / $this->fixed_page_num) - 1) * $this->fixed_page_num + 1 + 1; // Last plus one is for loop statement starts $start - 1
			$end   = (ceil($this->cur_page / $this->fixed_page_num) == ceil($num_pages / $this->fixed_page_num)) ? $num_pages : ceil($this->cur_page / $this->fixed_page_num) * $this->fixed_page_num;
		} else {
			$start = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links - 1) : 1;
			$end   = (($this->cur_page + $this->num_links) < $num_pages) ? ($this->cur_page <= $this->num_links ? $this->num_links * 2 : $this->cur_page + $this->num_links - 1)  : $num_pages;
			$start = $end - $start < $this->num_links * 2 ? ($end - $this->num_links * 2) + 1 : $start;
		}

		// Is pagination being used over GET or POST?  If get, add a per_page query
		// string. If post, add a trailing slash to the base URL if needed
		if ($CI->config->item('enable_query_strings') === true || $this->page_query_string === true) {
            $query_string_sep = (strpos($this->base_url, '?') === false) ? '?' : '&amp;';
			$this->base_url = rtrim($this->base_url).$query_string_sep.$this->query_string_segment.'=';
		} else {
			$this->base_url = rtrim($this->base_url, '/') .'/';
		}

		// And here we go...
		$output = '';

		// Render the "First" link
		if  ($this->first_link !== false) {
			if ($this->display_first_always === true && $this->disable_first_link === true && $this->cur_page == 1) {
				$output .= $this->disabled_first_tag_open.$this->first_link.$this->disabled_first_tag_close;
			} else if ($this->display_first_always === true || $this->cur_page != 1) {
				$first_url = (($this->first_url == '') ? $this->base_url : $this->first_url) . $first_page;
				$output .= $this->first_tag_open.'<a '.$this->anchor_class.'href="'.$first_url.'">'.$this->first_link.'</a>'.$this->first_tag_close;
			}
		}

		// Render the "previous" link
		if  ($this->prev_link !== false) {
			if ($this->display_prev_always === true && $this->disable_prev_link === true && $this->cur_page == 1) {
				$output .= $this->disabled_prev_tag_open.$this->prev_link.$this->disabled_prev_tag_close;
			} else if ($this->display_prev_always === true || $this->cur_page != 1) {
				if ($this->use_page_numbers) {
					//$i = $uri_page_number - 1;    // prev page
                    // prev group
                    $i = $start - 2;
                    $i < 1 && $i = $first_page;
				} else {
					$i = $uri_page_number - $this->per_page;
				}

				if ($i == 0 && $this->first_url != '') {
					$output .= $this->prev_tag_open.'<a '.$this->anchor_class.'href="'.$this->first_url.'">'.$this->prev_link.'</a>'.$this->prev_tag_close;
				} else {
					$i = ($i == 0) ? $first_page : $this->prefix.$i.$this->suffix;
					$output .= $this->prev_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$i.'">'.$this->prev_link.'</a>'.$this->prev_tag_close;
				}
			}
		}

		// Render the pages
		if ($this->display_pages !== false) {
			// Write the digit links
			for ($loop = $start -1; $loop <= $end; $loop++) {
				if ($this->use_page_numbers) {
					$i = $loop;
				} else {
					$i = ($loop * $this->per_page) - $this->per_page;
				}

				if ($i >= $base_page) {
					if ($this->cur_page == $loop) {
						$output .= $this->cur_tag_open.$loop.$this->cur_tag_close; // Current page
					} else {
						$n = ($i == $base_page) ? '' : $i;

						if ($n == '' && $this->first_url != '') {
							$output .= $this->num_tag_open.'<a '.$this->anchor_class.'href="'.$this->first_url.'">'.$loop.'</a>'.$this->num_tag_close;
						} else {
							$n = ($n == '') ? $first_page : $this->prefix.$n.$this->suffix;

							$output .= $this->num_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$n.'">'.$loop.'</a>'.$this->num_tag_close;
						}
					}
				}
			}
		}

		// Render the "next" link
		if ($this->next_link !== false) {
			if ($this->display_next_always === true && $this->disable_next_link === true && $this->cur_page == $num_pages) {
				$output .= $this->disabled_next_tag_open.$this->next_link.$this->disabled_next_tag_close;
			} else if ($this->display_next_always === true || $this->cur_page != $num_pages) {
				if ($this->use_page_numbers) {
					if ($this->cur_page == $num_pages) {
						$i = $num_pages;
					} else {
						//$i = $this->cur_page + 1;     // next page
                        // next group
                        $i = $this->cur_page + ($start + $this->fixed_page_num - $this->cur_page - 1);
                        $i > $num_pages && $i = $num_pages;
					}
				} else {
					$i = ($this->cur_page * $this->per_page);
				}

				$output .= $this->next_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$this->prefix.$i.$this->suffix.'">'.$this->next_link.'</a>'.$this->next_tag_close;
			}
		}

		// Render the "Last" link
		if ($this->last_link !== false) {
			if ($this->display_last_always === true && $this->disable_last_link === true && $this->cur_page == $num_pages) {
				$output .= $this->disabled_last_tag_open.$this->last_link.$this->disabled_last_tag_close;
			} else if ($this->display_first_always === true || $this->cur_page != $num_pages) {
				if ($this->use_page_numbers) {
					$i = $num_pages;
				} else {
					$i = (($num_pages * $this->per_page) - $this->per_page);
				}
				$output .= $this->last_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$this->prefix.$i.$this->suffix.'">'.$this->last_link.'</a>'.$this->last_tag_close;
			}
		}

		// Kill double slashes.  Note: Sometimes we can end up with a double slash
		// in the penultimate link so we'll kill all double slashes.
		$output = preg_replace("#([^:])//+#", "\\1/", $output);

		// Add the wrapper HTML if exists
		$output = $this->full_tag_open.$output.$this->full_tag_close;

		return $output;
	}
}
