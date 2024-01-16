@extends('layouts.front')
@section('content')

                 
<div class="info_white1 border_bottom">
            <div class="container">
              <div class="clearfix"></div>
              
              <div class="row-fluid">
                <div class="span12">
				 {{ $page[0]->left_block1_title }}
<table class="table table-striped">
          <colgroup>
              <col width="1">
              <col width="1">
              <col width="1">
              <col width="1">
              <col width="1">
              <col width="1">
              <col width="1">
          </colgroup>
          <thead>
              <tr>
                  <th>YEAR</th>
                  <th>&nbsp;</th>
                  @foreach ($highlights as $k => $value)
                  <th style="text-align: right;"><br>
                  {{ $value->year }}</th>
                  @endforeach
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>Earnings per share</td>
                  <td><strong>sen</strong></td>
                  @foreach ($highlights as $k => $value)
                  <td style="text-align: right;">{{ $value->earnpershare }}</td>
                  @endforeach
                 
              </tr>
              <tr>
                  <td>Net tangible asset per share</td>
                  <td><strong>RM</strong></td>
                  @foreach ($highlights as $k => $value)
                  <td style="text-align: right;">{{ $value->netpershare }}</td>
                  @endforeach
                 
              </tr>
              <tr>
                  <td>Current ratio</td>
                  <td><strong>times</strong></td>
                  @foreach ($highlights as $k => $value)
                  <td style="text-align: right;">{{ $value->currentratio }}</td>
                  @endforeach
                
              </tr>
              <tr>
                  <td>Pre-tax profit as a percentage of sales</td>
                  <td><strong>%</strong></td>
                  @foreach ($highlights as $k => $value)
                  <td style="text-align: right;">{{ $value->pretaxprofit }}</td>
                  @endforeach
                 
              </tr>
              <tr>
                  <td>Pre-tax profit as a percentage of shareholders' equity</td>
                  <td><strong>%</strong></td>
                  @foreach ($highlights as $k => $value)
                  <td style="text-align: right;">{{ $value->pretaxshareholders }}</td>
                  @endforeach
              </tr>
          </tbody>
      </table>                  
                  
                </div>
                      {{ $page[0]->left_block2_title }}      
              </div>
            </div>
            <i class="icon-signal right"></i>
          </div>		
@stop