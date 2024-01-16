@section('content')

        <table class="table table-striped">
            <colgroup><col width="1">
                <col width="1">

            </colgroup><tbody>
              	@if(isset($data['Admission Sponsor']))
              	<tr>
                    <td><strong>Admission Sponsor</strong></td>
                    <td>{{ $data['Admission Sponsor'] }}</td>
                </tr>
                @elseif(isset($data['Sponsor']))
                <tr>
                    <td><strong>Sponsor</strong></td>
                    <td>{{ $data['Sponsor'] }}</td>
                </tr>
                @endif
                <tr>
                    <td><strong>Financial Year End</strong></td>
                    <td>{{{ isset($data['Financial Year End']) ? $data['Financial Year End'] : '' }}}</td>
                </tr>
                <tr>
                    <td><strong>Quarter</strong></td>
                    <td>{{{ isset($data['Quarter']) ? $data['Quarter'] : '' }}}</td>
                </tr>
                <tr>
                    <td><strong>Quarterly report for the financial period ended</strong></td>
                    <td>{{{ isset($data['Quarterly report for the financial period ended']) ? $data['Quarterly report for the financial period ended'] : '' }}}</td>
                </tr>
                <tr>
                    <td><strong>The Figures</strong></td>
                    <td>{{{ isset($data['The figures']) ? $data['The figures'] : '' }}}</td>
                </tr>
                <tr>
                    <td><strong>Attachments</strong></td>
                    <td>@if(isset($data['Attachments'])){{HTML::link($attached, $data['Attachments'])}} @endif</td>
                </tr>

            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </tfoot>
        </table> 

        <h5>{{{ isset($data['CurrTitle']) ? $data['CurrTitle'] : '' }}}</h5>
        <table class="table table-striped">
            <colgroup><col width="1">
                <col>
                <col>
                <col>
                <col>
                <col>

            </colgroup><thead>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2"><div align="center"><strong>Individual Period</strong></div></td>
                    <td colspan="2"><div align="center"><strong>Cumulative Period</strong></div></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td><strong>Current Year Quarter</strong></td>
                    <td><strong>Preceding Year Corresponding Quarter</strong></td>
                    <td><strong>Current Year to Date</strong></td>
                    <td><strong>Preceding Year Corresponding Period</strong></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td>{{{ isset($tableValues[2]) ? $tableValues[2][0] : '' }}}</td>
                    <td>{{{ isset($tableValues[2]) ? $tableValues[2][1] : '' }}}</td>
                    <td>{{{ isset($tableValues[2]) ? $tableValues[2][2] : '' }}}</td>
                    <td>{{{ isset($tableValues[2]) ? $tableValues[2][3] : '' }}}</td>                    
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td><strong>RM '000</strong></td>
                    <td><strong>RM '000</strong></td>
                    <td><strong>RM '000</strong></td>
                    <td><strong>RM '000</strong></td>
                </tr>
            </thead>

            <tbody>
                @for ($i = 5; $i < 11; $i++)
                    <tr>
                        <td><strong>{{ isset($tableValues[$i][0]) ? $tableValues[$i][0] : '' }}</strong></td>
                        <td><strong>{{ isset($tableValues[$i][1]) ? $tableValues[$i][1] : ''}}</strong></td>
                        <td>{{ isset($tableValues[$i][2]) ? $tableValues[$i][2] : ''}}</td>
                        <td>{{ isset($tableValues[$i][3]) ? $tableValues[$i][3] : ''}}</td>
                        <td>{{ isset($tableValues[$i][4]) ? $tableValues[$i][4] : ''}}</td>
                        <td>{{ isset($tableValues[$i][5]) ? $tableValues[$i][5] : ''}}</td>
                    </tr>
                @endfor
        
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2"><strong>{{isset($tableValues[11][2]) ? $tableValues[11][2] : ''}}</strong></td>
                    <td colspan="2"><strong>{{isset($tableValues[11][3]) ? $tableValues[11][3] : ''}}</strong></td>
                </tr>
                <tr>
                    <td><strong>{{isset($tableValues[12][0]) ? $tableValues[12][0] : ''}}</strong></td>
                    <td><strong>{{isset($tableValues[12][1]) ? $tableValues[12][1] : ''}}</strong></td>
                    <td colspan="2">{{isset($tableValues[12][2]) ? $tableValues[12][2] : ''}}</td>
                    <td colspan="2">{{isset($tableValues[12][3]) ? $tableValues[12][3] : ''}}</td>
                </tr>


            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tfoot>
        </table> 

        <p>Remarks: N/A.</p> 
@stop