jQuery(function () {
  jQuery.ajax({
    url: 'chart_list.php',
    data: { type: 'list' },
    dataType: 'json',
    success: function (data) {
      jQuery('#title').html('')
      for (var i = 0; i < data.length; ++i) {
        jQuery('#title').append('<option data-func="' + data[i].func + '" value="' + data[i].title + '">' + data[i].title + '</option>')
      }
      json('/charts/data', jQuery('option:first', '#title').data('func'), '#container')

      jQuery('#title').change(function () {
        calling('#container', DATA, jQuery('option:selected', '#title').data('func'))
      })
    },
  })
})

var DATA
function json(file, callback, container, chart_only) {
  if (!DATA) {
    jQuery.get(file, {}, function (d) {
      var data = []
      for (var i = 0; i < d.length; ++i) {
        var x = []
        var dd = new Date(d[i].date.split(' ')[0]).getTime()
        var isZero = d[i].open == 0 && d[i].high == 0 && d[i].low == 0 ? true : false
        x.push(dd)
        x.push(!isZero ? Number(d[i].open) : Number(d[i].close))
        x.push(!isZero ? Number(d[i].high) : Number(d[i].close))
        x.push(!isZero ? Number(d[i].low) : Number(d[i].close))
        x.push(Number(d[i].close))
        x.push(Number(d[i].volume))
        x.push(Number(d[i].adjustment))
        data.push(x)
      }
      DATA = data
      calling(container, data, callback)
    })
  } else calling(container, DATA, callback)
}
function csv(file, callback, container) {
  if (!DATA) {
    jQuery.get(file, {}, function (data) {
      // Split the lines
      var lines = data.split('\n')
      var dataArr = []
      // Iterate over the lines and add categories or series

      jQuery.each(lines, function (lineNo, line) {
        // header line containes categories
        if (lineNo > 0) {
          var items = line.split(',')
          if (items.length < 5) return
          var arr = []
          jQuery.each(items, function (itemNo, item) {
            if (itemNo > 0) arr.push(parseFloat(item))
            else {
              var dt = item.split('-')
              arr.push(new Date(dt[2], dt[1], dt[0]).getTime())
            }
          })
          dataArr.push(arr)
        }
      })
      DATA = dataArr.reverse()
      calling(container, DATA, callback)
    })
  } else calling(container, DATA, callback)
}

function calling(container, data, callback) {
  switch (callback) {
    case 'candle_ma_volume_macd':
      candle_ma_volume_macd(container, data)
      break
    case 'candle_ma_volume_macd_so':
      candle_ma_volume_macd_so(container, data)
      break
    case 'candle_ma_volume_macd_rsi':
      candle_ma_volume_macd_rsi(container, data)
      break
    case 'candle_bb_volume_macd':
      candle_bb_volume_macd(container, data)
      break
    case 'line_ma_volume_macd':
      line_ma_volume_macd(container, data)
      break
    case 'line_volume':
      line_volume(container, data)
      break
  }
}

var candle_ma_volume_macd = function (container, data) {
  // split the data set into ohlc and volume
  var ohlc = [],
    volume = [],
    line = [],
    dataLength = data.length,
    // set the allowed units for data grouping
    groupingUnits = [
      [
        'week', // unit name
        [1], // allowed multiples
      ],
      ['month', [1, 2, 3, 4, 6]],
    ],
    i = 0

  for (i; i < dataLength; i += 1) {
    line.push([
      data[i][0], // the date
      data[i][4], // close
    ])
    ohlc.push([
      data[i][0], // the date
      data[i][1], // open
      data[i][2], // high
      data[i][3], // low
      data[i][4], // close
    ])

    volume.push([
      data[i][0], // the date
      data[i][5], // the volume
    ])
  }

  // create chart without jquery

  //   const dz_chart = Highcharts.chart('container', {
  //     chart: {
  //       type: 'bar',
  //     },
  //     title: {
  //       text: 'Fruit Consumption',
  //     },
  //     xAxis: {
  //       categories: ['Apples', 'Bananas', 'Oranges'],
  //     },
  //     yAxis: {
  //       title: {
  //         text: 'Fruit eaten',
  //       },
  //     },
  //     series: [
  //       {
  //         name: 'Jane',
  //         data: [1, 0, 4],
  //       },
  //       {
  //         name: 'John',
  //         data: [5, 7, 3],
  //       },
  //     ],
  //   })

  // create the chart3
  jQuery(container).highcharts('StockChart', {
    rangeSelector: {
      selected: 1,
    },

    title: {
      text: jQuery('#title').val(),
    },

    yAxis: [
      {
        labels: {
          align: 'right',
          x: -3,
        },
        title: {
          text: 'Share Price(RM)',
        },
        height: '40%',
        lineWidth: 2,
      },
      {
        labels: {
          align: 'right',
          x: -3,
        },
        title: {
          text: 'MACD',
        },
        top: '45%',
        height: '30%',
        offset: 0,
        lineWidth: 2,
      },
      {
        labels: {
          align: 'right',
          x: -3,
        },
        title: {
          text: 'Volume',
        },
        top: '80%',
        height: '20%',
        offset: 0,
        lineWidth: 2,
      },
    ],

    series: [
      {
        type: 'candlestick',
        name: 'LIENHOE',
        data: ohlc,
        id: 'sec',
        dataGrouping: {
          units: groupingUnits,
        },
      },
      {
        type: 'line',
        name: 'LIENHOE',
        data: line,
        id: 'primary',
        dataGrouping: {
          units: groupingUnits,
        },
        visible: false,
        showInLegend: false,
      },
      {
        name: 'MA(10)',
        linkedTo: 'primary',
        visible: true,
        showInLegend: true,
        type: 'trendline',
        algorithm: 'SMA',
        periods: 10,
      },
      {
        name: 'MA(40)',
        linkedTo: 'primary',
        visible: true,
        showInLegend: true,
        type: 'trendline',
        algorithm: 'SMA',
        periods: 40,
      },
      {
        name: 'MACD',
        linkedTo: 'primary',
        visible: true,
        yAxis: 1,
        showInLegend: true,
        type: 'trendline',
        algorithm: 'MACD',
      },
      {
        name: 'Signal line',
        linkedTo: 'primary',
        visible: true,
        yAxis: 1,
        showInLegend: true,
        type: 'trendline',
        algorithm: 'signalLine',
      },
      {
        name: 'Histogram',
        linkedTo: 'primary',
        visible: true,
        yAxis: 1,
        showInLegend: true,
        type: 'histogram',
        color: '#00FF88',
        negativeColor: '#FF0088',
      },
      {
        type: 'column',
        name: 'Volume',
        data: volume,
        yAxis: 2,
        id: 'vol',
        dataGrouping: {
          units: groupingUnits,
        },
      },
      {
        name: 'MA(30)',
        linkedTo: 'vol',
        showInLegend: true,
        type: 'trendline',
        algorithm: 'SMA',
        yAxis: 2,
        enableMouseTracking: false,
        periods: 30,
      },
    ],
  })
}

function candle_ma_volume_macd_so(container, data) {
  // split the data set into ohlc and volume
  var ohlc = [],
    volume = [],
    line = [],
    dataLength = data.length,
    // set the allowed units for data grouping
    groupingUnits = [
      [
        'week', // unit name
        [1], // allowed multiples
      ],
      ['month', [1, 2, 3, 4, 6]],
    ],
    i = 0

  for (i; i < dataLength; i += 1) {
    line.push([
      data[i][0], // the date
      data[i][4], // close
    ])
    ohlc.push([
      data[i][0], // the date
      data[i][1], // open
      data[i][2], // high
      data[i][3], // low
      data[i][4], // close
    ])

    volume.push([
      data[i][0], // the date
      data[i][5], // the volume
    ])
  }

  // create the chart3
  jQuery(container).highcharts('StockChart', {
    rangeSelector: {
      selected: 1,
    },

    title: {
      text: jQuery('#title').val(),
    },

    yAxis: [
      {
        labels: {
          align: 'right',
          x: -3,
        },
        title: {
          text: 'Share Price(RM)',
        },
        height: '40%',
        lineWidth: 2,
      },
      {
        labels: {
          align: 'right',
          x: -3,
        },
        title: {
          text: 'Stochastic',
        },
        top: '45%',
        height: '10%',
        offset: 0,
        lineWidth: 2,
      },
      {
        labels: {
          align: 'right',
          x: -3,
        },
        title: {
          text: 'MACD',
        },
        top: '60%',
        height: '20%',
        offset: 0,
        lineWidth: 2,
      },
      {
        labels: {
          align: 'right',
          x: -3,
        },
        title: {
          text: 'Volume',
        },
        top: '85%',
        height: '15%',
        offset: 0,
        lineWidth: 2,
      },
    ],

    series: [
      {
        type: 'candlestick',
        name: 'LIENHOE',
        data: ohlc,
        id: 'sec',
        dataGrouping: {
          units: groupingUnits,
        },
      },
      {
        type: 'line',
        name: 'Bollinger',
        data: line,
        id: 'primary',
        dataGrouping: {
          units: groupingUnits,
        },
        visible: false,
        showInLegend: false,
      },
      {
        name: 'MA(10)',
        linkedTo: 'primary',
        visible: true,
        showInLegend: true,
        type: 'trendline',
        algorithm: 'SMA',
        periods: 10,
      },
      {
        name: 'MA(40)',
        linkedTo: 'primary',
        visible: true,
        showInLegend: true,
        type: 'trendline',
        algorithm: 'SMA',
        periods: 40,
      },
      {
        name: '%K(14)',
        linkedTo: 'sec',
        showInLegend: true,
        type: 'trendline',
        algorithm: 'SOK',
        periods: 14,
        yAxis: 1,
      },
      {
        name: '%D(3)',
        linkedTo: 'sec',
        showInLegend: true,
        type: 'trendline',
        algorithm: 'SOD',
        periods: 14,
        yAxis: 1,
      },
      {
        name: 'MACD',
        linkedTo: 'primary',
        visible: true,
        yAxis: 2,
        showInLegend: true,
        type: 'trendline',
        algorithm: 'MACD',
      },
      {
        name: 'Signal',
        linkedTo: 'primary',
        visible: true,
        yAxis: 2,
        showInLegend: true,
        type: 'trendline',
        algorithm: 'signalLine',
      },
      {
        name: 'Histogram',
        linkedTo: 'primary',
        visible: true,
        yAxis: 2,
        showInLegend: true,
        type: 'histogram',
        color: '#00FF88',
        negativeColor: '#FF0088',
      },
      {
        type: 'column',
        name: 'Volume',
        data: volume,
        yAxis: 3,
        id: 'vol',
        dataGrouping: {
          units: groupingUnits,
        },
      },
      {
        name: 'MA(30)',
        linkedTo: 'vol',
        showInLegend: true,
        type: 'trendline',
        algorithm: 'SMA',
        yAxis: 3,
        enableMouseTracking: false,
        periods: 30,
      },
    ],
  })
}

function candle_ma_volume_macd_rsi(container, data) {
  // split the data set into ohlc and volume
  var ohlc = [],
    volume = [],
    line = [],
    dataLength = data.length,
    // set the allowed units for data grouping
    groupingUnits = [
      [
        'week', // unit name
        [1], // allowed multiples
      ],
      ['month', [1, 2, 3, 4, 6]],
    ],
    i = 0

  for (i; i < dataLength; i += 1) {
    line.push([
      data[i][0], // the date
      data[i][4], // close
    ])
    ohlc.push([
      data[i][0], // the date
      data[i][1], // open
      data[i][2], // high
      data[i][3], // low
      data[i][4], // close
    ])

    volume.push([
      data[i][0], // the date
      data[i][5], // the volume
    ])
  }

  // create the chart3
  jQuery(container).highcharts('StockChart', {
    rangeSelector: {
      selected: 1,
    },

    title: {
      text: jQuery('#title').val(),
    },

    yAxis: [
      {
        labels: {
          align: 'right',
          x: -3,
        },
        title: {
          text: 'Share Price(RM)',
        },
        height: '40%',
        lineWidth: 2,
      },
      {
        labels: {
          align: 'right',
          x: -3,
        },
        title: {
          text: 'RSI',
        },
        top: '45%',
        height: '10%',
        offset: 0,
        lineWidth: 2,
      },
      {
        labels: {
          align: 'right',
          x: -3,
        },
        title: {
          text: 'MACD',
        },
        top: '60%',
        height: '20%',
        offset: 0,
        lineWidth: 2,
      },
      {
        labels: {
          align: 'right',
          x: -3,
        },
        title: {
          text: 'Volume',
        },
        top: '85%',
        height: '15%',
        offset: 0,
        lineWidth: 2,
      },
    ],

    series: [
      {
        type: 'candlestick',
        name: 'LIENHOE',
        data: ohlc,
        id: 'sec',
        dataGrouping: {
          units: groupingUnits,
        },
      },
      {
        type: 'line',
        name: 'Bollinger',
        data: line,
        id: 'primary',
        dataGrouping: {
          units: groupingUnits,
        },
        visible: false,
        showInLegend: false,
      },
      {
        name: 'MA(10)',
        linkedTo: 'primary',
        visible: true,
        showInLegend: true,
        type: 'trendline',
        algorithm: 'SMA',
        periods: 10,
      },
      {
        name: 'MA(40)',
        linkedTo: 'primary',
        visible: true,
        showInLegend: true,
        type: 'trendline',
        algorithm: 'SMA',
        periods: 40,
      },
      {
        name: 'RSI(14)',
        linkedTo: 'primary',
        visible: true,
        showInLegend: true,
        type: 'trendline',
        algorithm: 'RSI',
        periods: 14,
        yAxis: 1,
      },
      {
        name: 'MACD',
        linkedTo: 'primary',
        visible: true,
        yAxis: 2,
        showInLegend: true,
        type: 'trendline',
        algorithm: 'MACD',
      },
      {
        name: 'Signal',
        linkedTo: 'primary',
        visible: true,
        yAxis: 2,
        showInLegend: true,
        type: 'trendline',
        algorithm: 'signalLine',
      },
      {
        name: 'Histogram',
        linkedTo: 'primary',
        visible: true,
        yAxis: 2,
        showInLegend: true,
        type: 'histogram',
        color: '#00FF88',
        negativeColor: '#FF0088',
      },
      {
        type: 'column',
        name: 'Volume',
        data: volume,
        yAxis: 3,
        id: 'vol',
        dataGrouping: {
          units: groupingUnits,
        },
      },
      {
        name: 'MA(30)',
        linkedTo: 'vol',
        showInLegend: true,
        type: 'trendline',
        algorithm: 'SMA',
        yAxis: 3,
        enableMouseTracking: false,
        periods: 30,
      },
    ],
  })
}

function candle_bb_volume_macd(container, data) {
  // split the data set into ohlc and volume
  var ohlc = [],
    volume = [],
    line = [],
    dataLength = data.length,
    // set the allowed units for data grouping
    groupingUnits = [
      [
        'week', // unit name
        [1], // allowed multiples
      ],
      ['month', [1, 2, 3, 4, 6]],
    ],
    i = 0

  for (i; i < dataLength; i += 1) {
    line.push([
      data[i][0], // the date
      data[i][4], // close
    ])
    ohlc.push([
      data[i][0], // the date
      data[i][1], // open
      data[i][2], // high
      data[i][3], // low
      data[i][4], // close
    ])

    volume.push([
      data[i][0], // the date
      data[i][5], // the volume
    ])
  }

  // create the chart3
  jQuery(container).highcharts('StockChart', {
    rangeSelector: {
      selected: 1,
    },

    title: {
      text: jQuery('#title').val(),
    },

    yAxis: [
      {
        labels: {
          align: 'right',
          x: -3,
        },
        title: {
          text: 'Share Price(RM)',
        },
        height: '40%',
        lineWidth: 2,
      },
      {
        labels: {
          align: 'right',
          x: -3,
        },
        title: {
          text: 'MACD',
        },
        top: '45%',
        height: '30%',
        offset: 0,
        lineWidth: 2,
      },
      {
        labels: {
          align: 'right',
          x: -3,
        },
        title: {
          text: 'Volume',
        },
        top: '80%',
        height: '20%',
        offset: 0,
        lineWidth: 2,
      },
    ],

    series: [
      {
        type: 'candlestick',
        name: 'LIENHOE',
        data: ohlc,
        id: 'sec',
        dataGrouping: {
          units: groupingUnits,
        },
      },
      {
        type: 'line',
        name: 'Bollinger',
        data: line,
        id: 'primary',
        dataGrouping: {
          units: groupingUnits,
        },
        visible: false,
        showInLegend: false,
      },
      {
        name: 'Bollinger Band Upper',
        linkedTo: 'primary',
        visible: true,
        showInLegend: false,
        type: 'trendline',
        algorithm: 'BBU',
        periods: 20,
        dashStyle: 'shortdot',
        color: 'pink',
      },
      {
        type: 'trendline',
        name: 'Bollinger Bands(20,0)',
        linkedTo: 'primary',
        visible: true,
        algorithm: 'SMA',
        periods: 20,
      },
      {
        name: 'Bollinger Band Lower',
        linkedTo: 'primary',
        visible: true,
        showInLegend: false,
        type: 'trendline',
        algorithm: 'BBL',
        periods: 20,
        dashStyle: 'shortdot',

        color: 'pink',
      },
      {
        name: 'MA(10)',
        linkedTo: 'primary',
        visible: true,
        showInLegend: true,
        type: 'trendline',
        algorithm: 'SMA',
        periods: 10,
      },
      {
        name: 'MA(40)',
        linkedTo: 'primary',
        visible: true,
        showInLegend: true,
        type: 'trendline',
        algorithm: 'SMA',
        periods: 40,
      },
      {
        name: 'MACD',
        linkedTo: 'primary',
        visible: true,
        yAxis: 1,
        showInLegend: true,
        type: 'trendline',
        algorithm: 'MACD',
      },
      {
        name: 'Signal',
        linkedTo: 'primary',
        visible: true,
        yAxis: 1,
        showInLegend: true,
        type: 'trendline',
        algorithm: 'signalLine',
      },
      {
        name: 'Histogram',
        linkedTo: 'primary',
        visible: true,
        yAxis: 1,
        showInLegend: true,
        type: 'histogram',
        color: '#00FF88',
        negativeColor: '#FF0088',
      },
      {
        type: 'column',
        name: 'Volume',
        data: volume,
        yAxis: 2,
        id: 'vol',
        dataGrouping: {
          units: groupingUnits,
        },
      },
      {
        name: 'MA(30)',
        linkedTo: 'vol',
        showInLegend: true,
        type: 'trendline',
        algorithm: 'SMA',
        yAxis: 2,
        enableMouseTracking: false,
        periods: 30,
      },
    ],
  })
}

function line_ma_volume_macd(container, data) {
  // split the data set into ohlc and volume
  var ohlc = [],
    volume = [],
    line = [],
    dataLength = data.length,
    // set the allowed units for data grouping
    groupingUnits = [
      [
        'week', // unit name
        [1], // allowed multiples
      ],
      ['month', [1, 2, 3, 4, 6]],
    ],
    i = 0

  for (i; i < dataLength; i += 1) {
    line.push([
      data[i][0], // the date
      data[i][4], // close
    ])

    volume.push([
      data[i][0], // the date
      data[i][5], // the volume
    ])
  }

  // create the chart3
  jQuery(container).highcharts('StockChart', {
    rangeSelector: {
      selected: 1,
    },

    title: {
      text: jQuery('#title').val(),
    },

    yAxis: [
      {
        labels: {
          align: 'right',
          x: -3,
        },
        title: {
          text: 'Share Price (RM)',
        },
        height: '60%',
        lineWidth: 2,
      },
      {
        labels: {
          align: 'right',
          x: -3,
        },
        title: {
          text: 'MACD',
        },
        top: '65%',
        height: '15%',
        offset: 0,
        lineWidth: 2,
      },
      {
        labels: {
          align: 'right',
          x: -3,
        },
        title: {
          text: 'Volume',
        },
        top: '85%',
        height: '15%',
        offset: 0,
        lineWidth: 2,
      },
    ],

    series: [
      {
        type: 'line',
        name: 'LIENHOE',
        data: line,
        id: 'primary',
        dataGrouping: {
          units: groupingUnits,
        },
      },
      {
        name: 'MA(10)',
        linkedTo: 'primary',
        visible: true,
        showInLegend: true,
        type: 'trendline',
        algorithm: 'SMA',
        periods: 10,
      },
      {
        name: 'MA(40)',
        linkedTo: 'primary',
        visible: true,
        showInLegend: true,
        type: 'trendline',
        algorithm: 'SMA',
        periods: 40,
      },
      {
        name: 'MACD',
        linkedTo: 'primary',
        visible: true,
        yAxis: 1,
        showInLegend: true,
        type: 'trendline',
        algorithm: 'MACD',
      },
      {
        name: 'Signal',
        linkedTo: 'primary',
        visible: true,
        yAxis: 1,
        showInLegend: true,
        type: 'trendline',
        algorithm: 'signalLine',
      },
      {
        name: 'Histogram',
        linkedTo: 'primary',
        visible: true,
        yAxis: 1,
        showInLegend: false,
        type: 'histogram',
        color: '#00FF88',
        negativeColor: '#FF0088',
      },
      {
        type: 'column',
        name: 'Volume',
        data: volume,
        yAxis: 2,
        id: 'vol',
        dataGrouping: {
          units: groupingUnits,
        },
      },
      {
        name: 'MA(30)',
        linkedTo: 'vol',
        showInLegend: true,
        type: 'trendline',
        algorithm: 'SMA',
        yAxis: 2,
        enableMouseTracking: false,
        periods: 30,
      },
    ],
  })
}

function line_volume(container, data) {
  // split the data set into ohlc and volume
  var ohlc = [],
    volume = [],
    line = [],
    dataLength = data.length,
    // set the allowed units for data grouping
    groupingUnits = [
      [
        'week', // unit name
        [1], // allowed multiples
      ],
      ['month', [1, 2, 3, 4, 6]],
    ],
    i = 0

  for (i; i < dataLength; i += 1) {
    line.push([
      data[i][0], // the date
      data[i][4], // close
    ])

    volume.push([
      data[i][0], // the date
      data[i][5], // the volume
    ])
  }

  // create the chart3
  jQuery(container).highcharts('StockChart', {
    rangeSelector: {
      selected: 1,
    },

    title: {
      text: jQuery('#title').val(),
    },

    yAxis: [
      {
        labels: {
          align: 'right',
          x: -3,
        },
        title: {
          text: 'Share Price (RM)',
        },
        height: '60%',
        lineWidth: 2,
      },
      {
        labels: {
          align: 'right',
          x: -3,
        },
        title: {
          text: 'Volume',
        },
        top: '65%',
        height: '35%',
        offset: 0,
        lineWidth: 2,
      },
    ],

    series: [
      {
        type: 'line',
        name: 'LIENHOE',
        data: line,
        id: 'primary',
        dataGrouping: {
          units: groupingUnits,
        },
      },
      {
        type: 'column',
        name: 'Volume',
        data: volume,
        yAxis: 1,
        id: 'vol',
        dataGrouping: {
          units: groupingUnits,
        },
      },
    ],
  })
}
