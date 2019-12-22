function Proxy_Manager(){
    var self= this;
    this.init= function(){

        $(document).on("click", ".removeAssignedProxy", function(){
        	$(this).parents(".item").remove();
        });

    };
};

Proxy_Manager= new Proxy_Manager();
$(function(){
    Proxy_Manager.init();
});