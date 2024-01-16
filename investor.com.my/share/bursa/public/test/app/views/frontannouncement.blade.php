@extends('layouts.front')
@section('content')
                 
<div class="container">
                <div class="clearfix">
                  <div class="grid_12">
                    <header class="entry-header clearfix">
                      <div class="format-icon">
                        <div class="format-icon-inner"> <i class="icon-bullhorn"></i> </div>
                      </div>
                      <div class="entry-header-inner">
                        {{ $page->left_block1_title }}
                      </div>
                    </header>
                    <div class="hr"></div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="grid_4">
                    <!-- company announcements start -->
              {{ $page->left_block1_content }}
                    <div class="list list-style__check">
                      <ul>
                      {{ $page->left_block2_title }}
                       {{ $page->left_block2_content }}
                       {{ $page->left_block3_title }}
                       
                      </ul>
                    </div>
                    <!-- company announcements end -->
                    <!-- annual audited accounts start -->
                  {{ $page->left_inner_block_title1 }}
                    <div class="list list-style__check">
                      <ul>
                        {{ $page->left_inner_block_content1 }}
                         {{ $page->left_inner_block_title2 }}
                         {{ $page->left_inner_block_content2 }}
                      </ul>
                    </div>
                    <!-- annual audited accounts end -->
                    <!-- circulars / notice to shareholders start -->
                     {{ $page->left_inner_block_title3 }}
                    <div class="list list-style__check">
                      <ul>
                        {{ $page->left_inner_block_content3 }}
                         {{ $page->left_inner_block_title4 }}
                         {{ $page->left_inner_block_content4 }}
                      </ul>
                    </div>
                    <!-- circulars / notice to shareholders end -->
                  </div>
                  <div class="grid_4">
                    <!-- changes in s/holding start -->
                    {{ $page->left_inner_block_title5 }}
                    <div class="list list-style__check">
                      <ul>
                         {{ $page->left_inner_block_content5 }}
                         {{ $page->left_inner_block_title6 }}
                         {{ $page->left_inner_block_content6 }}
                      </ul>
                    </div>
                    <!-- changes in s/holding end -->
                    <!-- annual reports start -->
                    {{ $page->left_inner_block_title7 }}
                    <div class="list list-style__check">
                      <ul>
                         {{ $page->left_inner_block_content7 }}
                         {{ $page->left_inner_block_title8 }}
                         {{ $page->left_inner_block_content8 }}
                      </ul>
                    </div>
                    
                    <!-- annual reports end -->
                  </div>
                  <div class="grid_4">
                    <!-- Extra Contact Box -->
                    <div class="cta">
                     {{ $page->right_block1_title }}
                     {{ $page->right_block1_content }}
                      <div class="bg-black">
                        <div class="center"> {{ $page->right_block2_title }}
                         {{ $page->right_block2_content }}</div>
                      </div>
                    </div>
                    <!-- Extra Contact Box / End -->
                  </div>
                </div>
		    </div>
                
                  
		
@stop