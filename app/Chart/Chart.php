<?php
namespace App\Chart;
use Illuminate\Support\Str;

class Chart
{
  /**
  * Chart Generate
  *
  * @var array
  */

  private $chart_build = [];
  private $chartType = [];
  private $dataMax = 0;
  private $dataSum = 0;

  public function setType($type)
  {

       $chartType = Str::camel(($type != '') ? $type : 'bar');
       $this->chartType = $chartType;
       $this->chart_build['type'] = $this->chartType;
       return $this;
  }

  public function setLabel(array $labels)
  {
      $this->chart_build['data']['labels'] = $labels;
      return $this;
  }

  public function Datasets(array $datasets)
  {
      // Empty chart message display config
    $dataList = optional($datasets)[0]['data'];
       // $dataMax = ( count($dataList) > 0) ? max($dataList) : 0;
       $dataMax = collect([$datasets])->flatten()->max();
       $this->dataSum =  $dataMax;

       if ( (empty($dataList)) || ($dataMax == 0) || $dataList == 0) {
         $this->chart_build['options']['title'] = [
           'display' => true,
           'text' => 'No data available at this moment',
         ];

         if($this->chartType == 'polarArea') {
           $this->chart_build['options']['scale'] = [
             'display' => false
           ];
         }

         $this->chart_build['options']['scales']['xAxes'][0] = [
           'display' => false
         ];
         $this->chart_build['options']['scales']['yAxes'][0] = [
           'display' => false
         ];
       }
       $this->dataMax = $dataMax;

      // Data binding
      $this->chart_build['data']['datasets'] = $datasets;

      return $this;
  }

  public function setOptions(array $options)
  {
      // Basics Configuration
      $this->chart_build['options']['maintainAspectRatio'] = false;

      $this->chart_build['options']['legend']['labels']['padding'] = 15;
      // $this->chart_build['options']['elements']['line'] = 0;
      $this->chart_build['options']['elements']['arc']['borderWidth'] = 0;
      $this->chart_build['options']['legend']['labels']['usePointStyle'] = $options['pointStyle'] ?? true;
      $this->chart_build['options']['legend']['position'] = $options['position'] ?? 'top';

      $this->chart_build['options']['legend']['display'] = $options['legend'] ?? true;

      /* Stacked */
      if(isset($options['stacked'])) {
        $this->chart_build['options']['scales']['xAxes'][0]['stacked'] = $options['stacked'];
        $this->chart_build['options']['scales']['yAxes'][0]['stacked'] = $options['stacked'];
      }

    /* GridLines */
      if(isset($options['gridLines'])) {
      $this->chart_build['options']['scales']['xAxes'][0]['gridLines']['display'] = $options['gridLines'];
      $this->chart_build['options']['scales']['yAxes'][0]['gridLines']['display'] = $options['gridLines'];
      }

     if ($this->chartType == 'line' || $this->chartType == 'bar' || $this->chartType == 'horizontalBar') {

       /* xAxes(barPercentage,ticks,scaleLabel,stacked) */
      if(isset($options['x'])) {
      $this->chart_build['options']['scales']['xAxes'][0]['ticks'] = [
           'beginAtZero' =>  false,
           'min' => 0,
           'autoSkip' => false,
           // 'stepSize' => 10,
           'suggestedMax' => 0,
           'precision'=>0
         ];

      $this->chart_build['options']['scales']['xAxes'][0]['scaleLabel'] = [
           'display' =>  true,
           'labelString' => $options['x'],
           'padding' => 10,
         ];

     $this->chart_build['options']['scales']['xAxes'][0]['barPercentage'] = 0.9;

      }

        /* yAxes(barPercentage,ticks,scaleLabel,stacked) */
      if(isset($options['y'])) {

        $this->chart_build['options']['scales']['yAxes'][0]['ticks'] = [
             'beginAtZero' =>  false,
             'min' => 0,
             'autoSkip' => false,
            // 'stepSize' => $options['fixedStepSize'] ?? 0,
             'suggestedMax' => 0,
             'precision'=>0
           ];

        $this->chart_build['options']['scales']['yAxes'][0]['scaleLabel'] = [
             'display' =>  true,
             'labelString' => $options['y'],
             'padding' => 10,
           ];

       $this->chart_build['options']['scales']['yAxes'][0]['barPercentage'] = 0.9;

      }
      $this->chart_build['options']['scales']['xAxes'][0]['ticks']['beginAtZero'] = true;

      $this->chart_build['options']['scales']['yAxes'][0]['ticks']['beginAtZero'] = true;

      $this->chart_build['options']['scales']['xAxes'][0]['ticks']['fixedStepSize'] = ($this->dataSum <= 10) ? 1 : 0;
      $this->chart_build['options']['scales']['yAxes'][0]['ticks']['fixedStepSize'] = ($this->dataSum <= 10) ? 1 : 0;

    }
    /* Doughnut chart */
    // if($this->chartType == 'doughnut') {
    //   $this->chart_build['options']['rotation'] = 3.150;
    //   $this->chart_build['options']['circumference'] = 3.150;
    // }

    /* PolarArea chart */
    if($this->chartType == 'polarArea') {
      $this->chart_build['options']['scale']['ticks']['display'] = false;
    }
        return $this;
}

    public function get()
    {
        return $this->chart_build;
    }

    public function colors($index)
    {
        $color = [
          'red' => '#ff3d00',
          'yellow' => '#ffeb3b',
          'green' => '#AED581',
          'blue' => '#4d62db',
          '0' => ['#2694a0','#596eba','#8e6d71','#afb42b','#f38934',
                  '#42a5f5','#FFB4A6','#ffd3a0','#a86695'],

          '1' => ['#445860','#42a5f5','#FFB74D','#9575CD','#87b2ae',
                 '#E1B682','#afb42b','#ce7b7b','#AD5235'],

          '2' => ['#596eba','#f38934','#afb42b','#a86695','#42a5f5',
                  '#b388ff','#ef9a9a','#AED581','#dce775','#bdbdbd'],

          '3' => ['#afb42b','#f38934','#91BFAB','#ce7b7b','#AD5235',
                  '#445860','#FFB4A6','#ffd3a0','#a86695'],

          '4' => ['#bf75ce', '#596eba', '#8e6d71', '#AED581', '#4DD0E1'],
          '5' => ['#d50000', '#e57373', '#FFB74D', '#AED581'],
          // 'critical' => 'rgba(217, 49, 52, 0.8)',
          // 'high' => 'rgba(255, 159, 64, 0.8)',
          // 'medium' => 'rgba(0, 178, 155, 0.8)',
          // 'low' => 'rgba(255, 194, 0, 0.8)',
          'critical' => '#f63334',
          'high' => '#ff5c33',
          'medium' => '#ffc200',
          'low' => '#00b29b',
          'open' => 'rgba(0, 178, 155, 0.9)',
          'closed' => 'rgba(255, 194, 0, 0.7)',
          'Open' => 'rgba(0, 178, 155, 0.9)',
          'Closed' => '#c9d2d8',
          'Accepted' => '#00b29b',
          'Declined' => '#f63334',
          // 'risk' => ["rgba(217, 49, 52, 0.5)","rgba(255, 159, 64, 0.5)",
          // "rgba(0, 178, 155, 0.5)","rgba(255, 194, 0, 0.5)"],
          'risk' => ["#f63334","#ff5c33","#ffc200","#00b29b", "#39afd1", "#ce7b7b"],
          'severity' => ["rgba(217, 49, 52, 0.8)","rgba(255, 159, 64, 0.8)",
          "rgba(0, 178, 155, 0.8)","rgba(255, 194, 0, 0.8)"]
        ];

        return $color[$index];
    }
    public function gauge($score)
      {
          $options = [
             'angle' => 0,
             'lineWidth' => 0.2,
             'radiusScale' => 0.74,
             'pointer' => [
               'length' => 0.45,
               'strokeWidth' => 0.035,
               'color' => '#b0b0b0'
             ],
             'colorStart' => '#f63334',
             'colorStop' => '#f63334',
             'strokeColor' => '#E0E0E0',
             'generateGradient' => true,
             'highDpiSupport' => true,
             'staticZones' => [
               ['strokeStyle' => '#01b29b', 'min' => 66, 'max' => 100],
               ['strokeStyle' => '#ffc200', 'min' => 33, 'max' => 66],
               ['strokeStyle' => '#f63334', 'min' => 0, 'max' => 33]
             ],
             'staticLabels' => [
               'font' => '12px \'Fira Sans\', sans-serif',
               'labels' => [0, 25, 50, 75, 100],
               'color' => '#b9b9b9',
               'fractionDigits' => 0
             ],
             'renderTicks' => [
               'divisions' => 4,
               'divWidth' => 1.1,
               'divLength' => 0.7,
               'divColor' => '#333333',
               'subDivisions' => 3,
               'subLength' => 0.5,
               'subWidth' => 0.6,
               'subColor' => '#b0b0b0'
             ]
         ];
         return [
           'options' => $options,
           'score' => $score
         ];
      }

  }
