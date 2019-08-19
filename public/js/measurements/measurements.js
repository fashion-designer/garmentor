(function(window)
{
    HYDMeasurements =
        {

            /**
             * Selectors
             *
             */
            selectors: {},

            /**
             * Initialize
             */
            init: function()
            {
                this.getElements();
            },

            /**
             * Get Elements
             */
            getElements: function()
            {
                let context = this;

                context.selectors =
                {
                    measurementChartIds             : document.querySelectorAll('.measurement-chart-id'),
                    measurementChartsModal          : document.getElementById('measurementChartsModal'),
                    measurementChartsConfigData     : document.getElementById('measurementChartsConfigData'),
                    measurementChartsSelectedImage  : document.getElementById('measurementChartsSelectedImage'),
                    measurementsChartSelectedId     : document.getElementById('measurementsChartSelectedId'),
                    buttons                         :
                    {
                        removeMeasurementsButton    : document.getElementById('removeMeasurementsButton'),
                        addMeasurementsButton       : document.getElementById('addMeasurementsButton'),
                    }
                };

                this.addHandlers();
            },

            /**
             * Add Handlers
             *
             */
            addHandlers: function()
            {
                let context = this;

                if(context.selectors.measurementChartIds)
                {
                    for(let i = 0; i < context.selectors.measurementChartIds.length; i++)
                    {
                        let measurementButton = context.selectors.measurementChartIds[i];

                        measurementButton.onclick = function ()
                        {
                            context.selectors.measurementChartsConfigData.innerHTML = '';

                            let chartId = this.getAttribute('data-measurement-chart-id');

                            if(chartId && context.selectors.measurementChartsConfigData && context.selectors.measurementChartsSelectedImage)
                            {
                                $(context.selectors.measurementChartsModal).modal('hide');

                                if(measurementsConfigData[chartId] !== undefined && measurementsChartImages[chartId] !== undefined)
                                {
                                    context.selectors.measurementChartsSelectedImage.src            = measurementsChartImages[chartId];
                                    context.selectors.measurementChartsSelectedImage.className      = 'visible';
                                    context.selectors.buttons.removeMeasurementsButton.className    = 'btn btn-warning';
                                    context.selectors.measurementsChartSelectedId.value             = chartId;

                                    _.each(measurementsConfigData[chartId], function (name, key)
                                    {
                                        let parentElement               = document.createElement('div');
                                        parentElement.className         = 'row m-1';

                                        let codeElement                 = document.createElement('div');
                                        codeElement.className           = 'col';
                                        codeElement.innerText           = key;

                                        let nameElement                 = document.createElement('div');
                                        nameElement.className           = 'col';
                                        nameElement.innerText           = name;

                                        let inputContainerElement       = document.createElement('div');
                                        inputContainerElement.className = 'col';
                                        inputContainerElement.innerHTML = '<input type="text" name="measurementConfig' + key + '" placeholder="enter value...">';

                                        parentElement.appendChild(codeElement);
                                        parentElement.appendChild(nameElement);
                                        parentElement.appendChild(inputContainerElement);

                                        context.selectors.measurementChartsConfigData.appendChild(parentElement);
                                    });
                                }
                            }
                        }
                    }
                }

                if(context.selectors.buttons.removeMeasurementsButton)
                {
                    context.selectors.buttons.removeMeasurementsButton.onclick = function ()
                    {
                        context.selectors.measurementChartsSelectedImage.src            = '#';
                        context.selectors.measurementChartsSelectedImage.className      = 'invisible';
                        context.selectors.measurementChartsConfigData.innerHTML         = '';
                        context.selectors.buttons.removeMeasurementsButton.className    = 'btn btn-warning d-none';
                    }
                }
            },
        }
})(window);