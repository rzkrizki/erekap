(function(){
    /*========================================
     * Webkit detection because animations SVG 
       in different browsers
    =========================================*/
    var isWebkit = 'WebkitAppearance' in document.documentElement.style;

    if (isWebkit) {
     webkitAnimation();
    } else {
      nonwebkit();
    }

    /*========================================
     * Animation for webkit with velocity.js
    =========================================*/
    function webkitAnimation() {
      $("#browser-container")
            .velocity(
              { 
                top: -40
              }, 900, 
              "easeInOutExpo"
            )
            .velocity(
              { 
                top: -20 
              }, 700,
               "easeOutExpo"
            );


      $("#btn-openModal")
          .velocity(
              { 
                opacity:1
              }, 
              { 
                delay: 800
              }
          );


      $("#cursor")
        .delay(900) // animation delay 
        // movimento do cursor a 'carregar'
        .velocity(
          { 
            translateX: 0, 
            translateY: -40 
          }
        )
        .delay(200) // faz um delay
        //faz o movimento do cursor para trás 
        .velocity(
          {
            translateY: -5,
            scaleY:0.9
          },
          {
            duration: 100,
                // mal começa a animação faz a animação de botão pressionado.
                begin: function() {  
                   $("#btn-openModal")
                        // animação do botão quando é pressionado 
                        .velocity(
                          { 
                            scale:0.9 
                          },110
                        )
                        .velocity(
                          "reverse", 
                          {
                           duration: 110 
                          }
                        );
                }
          }
        )
        .velocity(
              { 
                translateY: -40,
                scaleY:1
              },
              {
                duration: 100,
                // quando os movimentos do cursor e do botao estão concluidos dispara a animação da modal
                complete: function() {
                    $("#modal")
                        .velocity(
                            { 
                              scale:0
                            }
                        ) 
                        .velocity(
                            { 
                              opacity:1,
                              scale:1
                            },
                            // Quando a animação da modal está no inicio dispara a animação do botão fechar modal
                            {
                               duration:200,
                              begin: function() {
                                  $("#modal-btn-close")
                                      .delay(100)
                                      .velocity("transition.expandIn", { opacity:1, stagger: 250 });
                                  $("#el-01")
                                      .delay(200)
                                      .velocity("transition.expandIn", { opacity:1, stagger: 250 });
                                  $("#el-02")
                                      .delay(250)
                                      .velocity("transition.expandIn", { opacity:1, stagger: 250 });

                                  $("#el-03")
                                      .delay(350)
                                      .velocity("transition.expandIn", { opacity:1, stagger: 250 });

                              }
                            }
                        );        
                }

              }
          );

    }
       
    function nonwebkit() {


      $("#browser-container")
            .velocity(
              { 
                top: -40
              }, 900, 
              "easeInOutExpo"
            )
            .velocity(
              { 
                top: -20 
              }, 700,
               "easeOutExpo"
            );


      $("#btn-openModal")
          .velocity(
              { 
                opacity:1
              }, 
              { 
                delay: 800
              }
          );


      $("#cursor")
        .delay(900) // animation delay 
        // movimento do cursor a 'carregar'
        .velocity(
          { 
            translateX: 0, 
            translateY: -40 
          }
        )
        .delay(200) // faz um delay
        //faz o movimento do cursor para trás 
        .velocity(
          {
            translateY: -5,
            scaleY:0.9
          },
          {
            duration: 100,
                // mal começa a animação faz a animação de botão pressionado.
                begin: function() {  
                   $("#btn-openModal")
                        // animação do botão quando é pressionado 
                        .velocity(
                          { 
                            scale:0.9 
                          },110
                        )
                        .velocity(
                          "reverse", 
                          {
                           duration: 110 
                          }
                        );
                }
          }
        )
        .velocity(
              { 
                translateY: -40,
                scaleY:1
              },
              {
                duration: 100,
                // quando os movimentos do cursor e do botao estão concluidos dispara a animação da modal
                complete: function() {
                    $("#modal").velocity({ scale:0 }).velocity({ 
                              opacity:1,
                              scale:1
                            },
                            // Quando a animação da modal está no inicio dispara a animação do botão fechar modal
                            {
                               duration:200,
                              begin: function() {
                                  $("#modal-btn-close")
                                      .delay(100)
                                      .velocity("transition.slideLeftIn", { opacity:1, stagger: 250 });
                                  $("#el-01")
                                      .delay(200)
                                      .velocity("transition.slideLeftIn", { opacity:1, stagger: 250 });
                                  $("#el-02")
                                      .delay(250)
                                      .velocity("transition.slideLeftIn", { opacity:1, stagger: 250 });

                                  $("#el-03")
                                      .delay(350)
                                      .velocity("transition.slideLeftIn", { opacity:1, stagger: 250 });

                              }
                            }
                        );        
                }

            }
        );
    }
});