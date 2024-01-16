<div class="sidebar-collapse menu-scroll">
                <ul id="side-menu" class="nav">
                    <li class="clock"><strong id="get-date"></strong>

                        <div class="digital-clock">
                            <div id="getHours" class="get-time"></div>
                            <span>:</span>

                            <div id="getMinutes" class="get-time"></div>
                            <span>:</span>

                            <div id="getSeconds" class="get-time"></div>
                        </div>
                    </li>
                    <li class="active"><a href="#"><i class="fa fa-bullhorn fa-fw"></i><span class="menu-title">News Centre</span><span class="fa arrow"></span></a>      
                        <ul class="nav nav-second-level in">
                            
                            <li class="{{ Request::segment(2) == 'media_news_list' ? 'active' : ''; }}"><a href="{{ URL::to('admin/media_news_list') }}">Media News</a></li>
                            <li class="{{ Request::segment(2) == 'web_scrapping_list' ? 'active' : ''; }}"><a href="{{ URL::to('admin/web_scrapping_list') }}">Web Source Listing</a></li>

                        </ul>
                    </li>
                </ul>
            </div>