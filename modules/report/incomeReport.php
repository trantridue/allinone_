<div id="chartmain">

<script lang="javascript" type="text/javascript">
var background = {
        type: 'linearGradient',
        x0: 0,
        y0: 0,
        x1: 1,
        y1: 1,
        colorStops: [{ offset: 0, color: '#d2e6c9' },
                     { offset: 1, color: 'white'}]
    };
        $(document).ready(function () {
            $('#jqChart').jqChart({
            	background: background,      
            	border: { strokeStyle: '#6ba851' },            	
            	tooltips: { type: 'shared' },
            	shadows: {
                    enabled: true,
                    shadowColor: 'gray',
                    shadowBlur: 10,
                    shadowOffsetX: 3,
                    shadowOffsetY: 3
                },
                crosshairs: {
                    enabled: true,
                    hLine: false,
                    vLine: { strokeStyle: '#cc0a0c' }
                },
            	legend: { title: 'Legend' },            	
                title: { text: 'Biểu đồ doanh thu' },
                axes: [
                        {
                        	type: 'category',
                            location: 'bottom',
                            zoomEnabled: true
                        }
                      ],
                series: [
                            {   title : "3 Shop",
                                type: 'spline',                                
                                data: [['2015-06-01',2515],['2015-06-02',2600]]                                       
                            },
                            {	title : "Shop 1",
                            	type: 'spline',                              
                                data: [['2015-06-01',810],['2015-06-02',1000]]                                       
                            },
                            {	title : "Shop 2",                            
                            	type: 'spline',                                
                                data: [['2015-06-01',1105],['2015-06-02',700]]                                       
                            },
                            {	title : "Shop 3",                            
                            	type: 'spline',                                
                                data: [['2015-06-01',2205],['2015-06-02',900]]                                       
                            }
                        ]
            });
        });
    </script></div>

<div id="jqChart" style="width: 100%; height: 520px;"></div>

