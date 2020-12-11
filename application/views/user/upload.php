<div class="container">
  <button class="btn btn-primary" ng-click="vm.addDoc()">Add</button>
  <div class="panel-group" data-as-sortable="vm.documentDragListeners" ng-model="vm.documents">
    <div class="panel panel-default xlist" ng-repeat="doc in vm.documents" data-as-sortable-item>
      <div class="panel-heading">
        <h4 class="panel-title">
          <i class="fa fa-grip-large fa-rotate-90" data-as-sortable-item-handle></i>
          <a href="" data-toggle="collapse" data-target="#collapse{{$index}}"></a>
        </h4>
      </div>
    </div>
  </div>
</div>