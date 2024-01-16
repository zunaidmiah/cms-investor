@extends('layouts.front1')
@section('content')
<div class="info_white1 border_bottom">
            <div class="container">
              <h2 class="red-title pull-left"><span>Additional Listing Announcement</span></h2>
              <p class="pull-right">View Year:
                 <select name="select" id="subject">
                    <option>-- Select --</option>
                    <option>2014</option>
                    <option>2013</option>
                    <option>2012</option>
                    <option>2011</option>
                    <option>2010</option>
                    <option>Archives</option>
                 </select>
              </p>
              <div class="clearfix"></div>
              
              <div class="margin_top_10px">
                  <form id="form" action="POST">
                     <h6>Search Date</h6>
                     <input type="text" placeholder="From (dd/mm/yyyy)" name="Name" class="input-medium">
                     <input type="text" placeholder="To (dd/mm/yyyy)" name="Name" class="input-medium">
                     <input type="submit" name="Submit" value="Filter" class="button">
                     <input type="reset" name="reset" value="Reset" class="button">
                  </form>
              </div>           
              
              <!-- note to programmer: the order of the announcement is from top (the latest) to bottom (the oldest) -->
              <div class="row-fluid">
                <div class="span12">
                  <table class="table table-striped">
                  	<col width="1"/>
                	<col />
                    <col />
                    <col />
                    
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Announcement Date</th>
                        <th>Company</th>
                        <th>Title</th>
                      </tr>
                    </thead>
                    <tbody>
           <?php
          $i=1;
          ?>
          @if((!empty($frontAdditionallisting)) && (count($frontAdditionallisting)!=0))
          @foreach($frontAdditionallisting as $Listing)
          
          <tr>
                        <td>{{ $i }} </td>
                        <td>{{ $Listing->date_of_publishing }}</td>
                        <td>{{ $Listing->company_name }}</td>
                        <th><a href = "{{url('/investorrelations/frontadditionallistingdetail', $Listing->id )}}"> {{ $Listing->title }}</th>
          </tr>
          <?php
          $i++; 
          
          ?>
          @endforeach
          @else
                      <tr>
                         <td colspan="4"><div align="center">There are no announcements.</div></td>
                      </tr>
          @endif
                    </tbody>
                    <tfoot>
                    	<tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tfoot>
                  </table> 
                  
                </div>
                   
              </div>
            </div>
            <i class="icon-bullhorn right"></i>
          </div>
          <!-- End Info white -->
          
        <!-- InstanceEndEditable -->
@stop