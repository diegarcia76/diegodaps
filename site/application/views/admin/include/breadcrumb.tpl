			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb">
				<li>
					<a href="{site_url()}admin">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
                {foreach $breadcrumb as $aLink}
                <li>
                    <a href="{$aLink}">{$aLink@key}</a>
                    {if $aLink@last neq true}<i class="fa fa-angle-right"></i>{/if}
                </li>
                {/foreach}
			</ul>
			<!-- END PAGE BREADCRUMB -->
