$(document).ready(
		function() {
			$('#example').dataTable(
					{
						"footerCallback" : function(row, data, start, end,
								display) {
							var api = this.api(), data;

							// Remove the formatting to get integer data for
							// summation
							var intVal = function(i) {
								return typeof i === 'string' ? i.replace(
										/[\$,]/g, '') * 1
										: typeof i === 'number' ? i : 0;
							};
							var TotalMarks = 0;
							for (var i = 0; i < data.length; i++) {
								TotalMarks += data[i][4] * 1;
							}

							var pageTotal = api.column(4, {
								page : 'current'
							}).data().reduce(function(a, b) {
								return intVal(a) + intVal(b);
							});

							// Update footer
							$(api.column(3).footer()).html(
									pageTotal + "-" + TotalMarks);
						}
					});
		});
