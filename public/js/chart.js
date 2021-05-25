$('document').ready(function() {

  $('canvas[id]').each(function() {
    var chart = $(this);
    // var chartType = chart.data('type');
    var chartUrl = chart.data('url');
    var chartId = chart.attr('id');
    var chartName;

    var ctx = document.getElementById(chartId).getContext('2d');

    var param_chart_type = localStorage.getItem(chartId + 'chart_type');


    //
    if (localStorage.getItem(chartId + 'chart_type') !== null) {
      if (param_chart_type !== null) {
        $('select[data-typeid=' + chartId + ']').val(param_chart_type);
      }
    }

    /* Load Ajax    */

    var url = chartUrl + '?chart_type=' + param_chart_type + '&chart_id=' + chartId;

    $.get(url, function(chartData) {
      chartName = new Chart(ctx, chartData);
    });

    /* Select filter by calender */
    $('select[data-typeid=' + chartId + ']').change(function() {

      var view_by = $(this).val();
      var url = chartUrl + '?chart_type=' + view_by;

      //
      // localStorage.setItem(chartId + '_url', url);
      localStorage.setItem(chartId + 'chart_type', view_by);

      // chart.attr('data-url', chartUrl + '?chart_type=' + localStorage.getItem(chartId + 'chart_type'));
      chart.attr('data-type', view_by);

      $.get(url, function(chartData) {
        // chartName.options = chartData.options;
        chartName.data = chartData.data;
        chartName.type = chartData.type;
        chartName.update();
      });
    });
  });
});