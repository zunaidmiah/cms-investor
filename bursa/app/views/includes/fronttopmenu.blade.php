<li class="menu-item current-menu-item menu-item-home "><a href="{{ URL::to('cms') }}">Home</a></li>
<li class="menu-item menu-item-has-children arrow"><a href="#">Company</a>
<ul class="sub-menu">
    {{--<li class="menu-item"><a href="{{ URL::to('cms/ceomessage') }}">CEO's Message</a></li>--}}
    <li class="menu-item"><a href="{{ URL::to('cms/profile') }}">Corporate Profile</a></li>
	{{--<li class="menu-item"><a href="{{ URL::to('cms/structure') }}">Corporate Structure</a></li>--}}
	<li class="menu-item"><a href="{{ URL::to('investorrelations/corporateinformation/directorprofile') }}">Board of Directors</a></li>
    <li class="menu-item"><a href="{{ URL::to('investorrelations/corporateinformation/keymanagemnet') }}">Key Senior Management</a></li>
    {{-- <li class="menu-item menu-item-has-children"><a href="{{ URL::to('pages/news_events') }}">Company Bulletin, CSR &amp; Training</a></li>
                   <li class="menu-item"><a href="#">Links</a>
                    <ul class="sub-menu">
                       @foreach($links as $link)
                       <li class="menu-item"><a href="{{ $link->link_url }}" target="_blank">{{ strip_tags($link->link_name) }}</a></li>
                       @endforeach
                    </ul>
                </li> --}}
{{-- <li class="menu-item"><a href="{{ URL::to('create_vacancy') }}">Careers</a></li> --}}
</ul>
</li>
<li class="menu-item menu-item-has-children arrow"><a href="#">Core Business</a>
    <ul class="sub-menu">
   {{-- <li class="menu-item"><a href="{{ URL::to('cms/core_sub/core_pdib') }}">Building & Civil Works</a></li> --}}
        <li class="menu-item"><a href="{{ URL::to('cms/core_sub/core_sb') }}">Hospitality</a></li>
        <li class="menu-item"><a href="{{ URL::to('cms/core_sub/core_lafmb') }}">Property Development & Investment</a></li>
    </ul>
</li>
<li class="menu-item menu-item-has-children arrow"><a href="#">Governance</a>
<ul class="sub-menu">
                     {{--<li class="menu-item"><a href="{{ URL::to('investorrelations/corporategovernance') }}">Corporate Governance</a></li>--}}
                            <li class="menu-item"><a href="{{ URL::to('investorrelations/managementanalysis/reviewoperations') }}">Board Charter</a></li>
<li class="menu-item"><a href="#">Policies</a>
                <ul class="sub-menu">
								<li class="menu-item"><a href="{{ URL::to('investorrelations/financialinformation/equitychanges') }}">Anti-Corruption & Bribery Policy</a></li>
								<li class="menu-item"><a href="{{ URL::to('investorrelations/managementanalysis/directorsfitandproperpolicy') }}">Directors’ Fit and Proper Policy</a></li>
								<li class="menu-item"><a href="{{ URL::to('investorrelations/managementanalysis/externalauditorsassessmentpolicy') }}">External Auditors Assessment Policy</a></li>
								<li class="menu-item"><a href="{{ URL::to('investorrelations/managementanalysis/genderdiversitypolicy') }}">Gender Diversity Policy</a></li>
                                <li class="menu-item"><a href="{{ URL::to('investorrelations/managementanalysis/remunerationpolicy') }}">Remuneration Policy</a></li>
                                <li class="menu-item"><a href="{{ URL::to('investorrelations/managementanalysis/whistleblowerpolicy') }}">Whistleblowing Policy</a></li>
                               
                                                   </ul>
</li>
                            <li class="menu-item"><a href="#">Terms of Reference</a>
                <ul class="sub-menu">
                                {{--<li class="menu-item"><a href="{{ URL::to('sustainability/tor-audit-management-committee') }}">Audit Committee</a></li>--}}
                                <li class="menu-item"><a href="{{ URL::to('sustainability/tor-risk-management-committee') }}">Audit & Risk Management Committee</a></li>
                                <li class="menu-item"><a href="{{ URL::to('investorrelations/corporateinformation/oursubsidiaries') }}">Remuneration Committee</a></li>
                <li class="menu-item"><a href="{{ URL::to('sustainability/board-nomination-committe') }}">Nomination Committee</a></li>
                                                   </ul>
            </li>
            <li class="menu-item"><a href="{{ URL::to('investorrelations/managementanalysis/cbce') }}">Code of Business Conduct & Ethics</a></li>
                          </ul>
</li>
<li class="menu-item current-menu-item menu-item-home "><a href="{{ URL::to('investorrelations/reports/prospectus') }}">AGM/EGM</a></li>
<li class=" menu-item menu-item-has-children arrow"><a href="{{ URL::to('') }}">Investor Relations</a>
<ul class="sub-menu">
    <!--<li class="menu-item menu-item-has-children"><a href="#">Corporate Information</a>
    <ul class="sub-menu">
        <li class="menu-item"><a href="#">Statutory Information</a></li>
        <li class="menu-item"><a href="{{ URL::to('board') }}">Board of Directors</a></li>
        <li class="menu-item"><a href="{{ URL::to('investorrelations/corporateinformation/keymanagemnet') }}">Key Senior Management</a></li>
    </ul>
    </li>
    <li class="menu-item menu-item-has-children"><a href="#">Board Committees</a>
    <ul class="sub-menu">
        <li class="menu-item"><a href="#">Nomination Committee</a></li>
        <li class="menu-item"><a href="#">Risk Management Committee</a></li>
        <li class="menu-item"><a href="#">Audit Committee</a></li>
        <li class="menu-item"><a href="#">Remuneration Committee</a></li>
    </ul>
    </li>-->
    <li class="menu-item menu-item-has-children"><a href="#">Share Information</a>
    <ul class="sub-menu">
        <li class="menu-item"><a href="{{ URL::to('investorrelations/shareinformation/priceticker')}}">Price Ticker</a></li>
        <li class="menu-item"><a href="{{ URL::to('charts') }}">Stock Charts</a></li>
        <!--<li class="menu-item"><a href="#">Price & Volume</a></li>
        <li class="menu-item"><a href="#">Shareholder</a></li>-->
    </ul>
    </li>
    <li class="menu-item menu-item-has-children"><a href="#">Financial Information</a>
    <ul class="sub-menu">
        <li class="menu-item"><a href="{{ URL::to('investorrelations/financialinformation/financialhighlights') }}">Financial Statistics</a></li>
                                <!--<li class="menu-item"><a href="#">Statements of Comprehensive Income</a></li>
                                <li class="menu-item"><a href="#">Statements of Financial Position</a></li>-->
                                <li class="menu-item"><a href="{{ URL::to('investorrelations/financialinformation/segmentalanalysis') }}">Highlights</a></li>
                                <!--<li class="menu-item"><a href="#">Production Statistics</a></li>
                <li class="menu-item"><a href="#">Key Audit Matters</a></li>-->
    </ul>
    </li>
<li class="menu-item menu-item-has-children"><a href="#">News Centre</a>
    <ul class="sub-menu">
        <li class="menu-item"><a href="{{ URL::to('investorrelations/newscentre/bursaannouncements') }}">Bursa Announcements</a></li>
        <li class="menu-item"><a href="{{ URL::to('media_news/media') }}">Media News</a></li>
        <!--<li class="menu-item"><a href="#">Corporate News</a></li>-->
    </ul>
    </li>
<li class="menu-item menu-item-has-children"><a href="#">Reports</a>
    <ul class="sub-menu">
        <li class="menu-item"><a href="{{ URL::to('investorrelations/reports/annualreports') }}">Annual Reports</a></li>
        <li class="menu-item"><a href="{{ URL::to('investorrelations/reports/quarterlyreports') }}">Quarterly Reports</a></li>
<!--<li class="menu-item"><a href="{{ URL::to('investorrelations/reports/prospectus') }}">AGM/EGM/MSWG</a></li>-->
    </ul>
    </li>
<li class="menu-item"><a href="{{ URL::to('investorrelations/managementanalysis/summaryofshareholdersvotingrights') }}">Summary of Shareholders' Voting Rights</a></li>	
<li class="menu-item"><a href="{{ URL::to('investorrelations/managementanalysis/edividend') }}">eDividend</a></li>
<!--<li class="menu-item menu-item-has-children"><a href="#">Investor Tools</a>
    <ul class="sub-menu">
        <li class="menu-item"><a href="#">News Alert</a></li>
        <li class="menu-item"><a href="#">Price Gain/Loss Calculator</a></li>
    </ul>
    </li>-->
</ul>
</li>
<li class="menu-item menu-item-has-children arrow"><a href="#">Contact Us</a>
<ul class="sub-menu">
    <li class="menu-item"><a href="{{ URL::to('contactus') }}">Contact Us Info</a></li>
    <li class="menu-item"><a href="{{ URL::to('cms/create_vacancy') }}">Careers</a></li>
</ul>
</li>