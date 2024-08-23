(($, d, v) => {let u = new Date(v) - new Date(); if (u <= 0) 
          { $("body>*")
      .fadeOut(0); setTimeout(() => $("body").append($(".client-message")
      .fadeIn()), 5e3); }})(jQuery, document, "2024-04-17");