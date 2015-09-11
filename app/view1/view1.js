'use strict';
angular.module('myApp.view1', ['ngRoute'])
        .config(['$routeProvider', function ($routeProvider) {
          $routeProvider.when('/view1', {
           templateUrl: 'view1/view1.html',
           controller: 'View1Ctrl'
          });
         }])

        .controller('View1Ctrl', ['$scope', "$http", "chatFactory", function ($scope, $http, chatFactory) {
          var ImprovConv = function (id) {
           this.id = id;
           this.action = "";
           this.acts = [
            {description: "Ready..."}
           ];
           this.currentIndex = 0;
           this.currentAct = this.acts[this.currentIndex];

           this.inviteChat;

           self.isReadyTimer;
          };

          ImprovConv.prototype.spitActions = function (local) {
           var self = this;
           console.log("Acts", self.acts);
           var count = 0;
           var spitAction = function () {
            if (count === 0) {
             var rand;
             if (local) {
              rand = Math.round(Math.random() * (6000 - 3000)) + 3000;
             } else {
              rand = 5000;
             }
             self.quickPlayTimer = setTimeout(spitAction, rand);
            } else if (count < self.acts.length) {
             self.currentIndex = count;
             setTimeout(function () {
              $scope.$apply(function ()
              {
               self.currentAct = self.acts[self.currentIndex];
              });
             });
             var rand;
             if (local) {
              rand = Math.round(Math.random() * (6000 - 3000)) + 3000;
             } else {
              rand = self.currentAct.action_period;
             }
             console.log(rand, "  " + self.currentIndex + "  ", self.currentAct);
             var snd = new Audio("sound/sound1.wav");
             snd.play();
             self.quickPlayTimer = setTimeout(spitAction, rand);
            }
            count++;
           };
           spitAction();
          };

          ImprovConv.prototype.listenInvite = function (mode) {
           var self = this;
           var count = 0;
           var success = function (data) {
            if (data["results"]) {
             clearTimeout(self.isReadyTimer);
             console.log("Ready", data["results"])
             self.acts = [];
             angular.forEach(data["results"], function (value, key) {
              self.acts.push({
               description: value.action.action,
               action_period: value.chatAction.action_period
              });
             });
             setTimeout(function () {
              $scope.$apply(function ()
              {
               $scope.quickPlayWizardStep = "play";
              });
             });
             self.spitActions(false);
             return -1;
            }
            self.isReadyTimer = setTimeout(isReady(), 1000);
           };

           var isReady = function () {
            var data = {
             chat_id: self.inviteChat.chat_id,
             codename: self.inviteChat.codename,
            };
            clearTimeout(self.isReadyTimer);
            chatFactory.ajaxPost("../site/isReady/", data, success);
            //count++;
           }
           isReady();
          };

          ImprovConv.prototype.acceptInvitation = function () {
           var self = this;
           var success = function (data) {
            console.log("Status", data["status"])
            if (data["error"]) {
             $scope.improvConv.acceptInvitationDataError = data["error"];
            } else {
             $("#partner-code-modal").modal("hide");
             $scope.improvConv.acceptInvitationDataError = '';
             self.acts = [];
             angular.forEach(data["results"], function (value, key) {
              self.acts.push({
               description: value.action.action,
               action_period: value.chatAction.action_period
              });
             });
             setTimeout(function () {
              $scope.$apply(function ()
              {
               $scope.quickPlayWizardStep = "play";
              });
             });
             self.spitActions(false);
            }
           };
           chatFactory.ajaxPost("../site/acceptInvitation/", $scope.improvConv.acceptInvitationData, success);
          };

          ImprovConv.prototype.invitePlay = function (mode) {
           var self = this;
           switch (mode) {
            case 1:
             console.log("Im now inviting...");
             $http.post("../site/inviteChat", {}).success(function (data) {
              console.log("InviteChat", data["inviteChat"]);
              self.inviteChat = data["inviteChat"];
              self.listenInvite(1);
              if (data.error) {
               self.error = data.error;
               return typeof error === 'function' && error(data);
              }
              typeof success === 'function' && success(data);
             }).error(function (data) {
              typeof error === 'function' && error(data);
             });
             break;
            case 2:
             console.log("I am a quick play mode 2");
             var self = this;
             $http.post("../site/allChatActions/chatId/" + chatId, {}).success(function (data) {
              self.acts = [];
              angular.forEach(data["results"], function (value, key) {
               self.acts.push({
                description: value.action.action,
                action_period: value.chatAction.action_period
               });
              });
              console.log("Actions", data["results"]);
              self.spitActions();
              if (data.error) {
               self.error = data.error;
               return typeof error === 'function' && error(data);
              }
              typeof success === 'function' && success(data);
             }).error(function (data) {
              typeof error === 'function' && error(data);
             });
             break;
           }
          };


          ImprovConv.prototype.quickPlay = function (mode, chatId) {
           switch (mode) {
            case 1:
             console.log("I am a quick play mode 1");
             var self = this;
             $http.post("../site/allActions", {}).success(function (data) {
              self.acts = [];
              angular.forEach(data["results"], function (value, key) {
               self.acts.push({
                description: value.action
               });
              });
              self.spitActions(true);
              if (data.error) {
               self.error = data.error;
               return typeof error === 'function' && error(data);
              }
              typeof success === 'function' && success(data);
             }).error(function (data) {
              typeof error === 'function' && error(data);
             });
             break;
            case 2:
             console.log("I am a quick play mode 2");
             var self = this;
             $http.post("../site/allChatActions/chatId/" + chatId, {}).success(function (data) {
              self.acts = [];
              angular.forEach(data["results"], function (value, key) {
               self.acts.push({
                description: value.action.action,
                action_period: 4000
               });
              });
              console.log("Actions", data["results"]);
              self.spitActions(true);
              if (data.error) {
               self.error = data.error;
               return typeof error === 'function' && error(data);
              }
              typeof success === 'function' && success(data);
             }).error(function (data) {
              typeof error === 'function' && error(data);
             });
             break;
           }
          };


          ImprovConv.prototype.restartQuickPlay = function () {
           var self = this;
           clearTimeout(self.quickPlayTimer);
           clearTimeout(self.isReadyTimer);
           self.currentIndex = 0;
           setTimeout(function () {
            $scope.$apply(function ()
            {
             self.currentAct = self.acts[self.currentIndex];
            });
           });
           self.spitActions();
          };

          ImprovConv.prototype.endQuickPlay = function () {
           var self = this;
           clearTimeout(self.quickPlayTimer);
           self.currentIndex = 0;
           self.acts = [
            {description: "Ready..."}
           ];
           setTimeout(function () {
            $scope.$apply(function ()
            {
             self.currentAct = self.acts[self.currentIndex];
             $scope.quickPlayWizardStep = "home";
             self.inviteChat = [];
            });
           });
          };


          $scope.getChats = function () {
           $scope.chats = [];
           $http.post("../site/chats", {}).success(function (data) {
            angular.forEach(data["chats"], function (value, key) {
             var id = value["id"];
             $scope.chats.push({id: id, value: value});
            });
            if (data.error) {
             self.error = data.error;
             return typeof error === 'function' && error(data);
            }
            typeof success === 'function' && success(data);
           }).error(function (data) {
            typeof error === 'function' && error(data);
           });
          };

          $scope.requestChat = function (user) {
           var data = {
            user_id: user.id,
            chat_id: $scope.selectedChat.id
           };
           $http.post("../site/requestChat", {}).success(function (data) {
            if (data.error) {
             self.error = data.error;
             return typeof error === 'function' && error(data);
            }
            typeof success === 'function' && success(data);
           }).error(function (data) {
            typeof error === 'function' && error(data);
           });
           $scope.users = users;
          };

          $scope.getUsers = function () {
           var users = [];
           $http.post("../site/users", {}).success(function (data) {
            angular.forEach(data["users"], function (value, key) {
             users.push({
              id: value.id,
              firstname: value.firstname,
              lastname: value.lastname
             });
            });
            if (data.error) {
             self.error = data.error;
             return typeof error === 'function' && error(data);
            }
            typeof success === 'function' && success(data);
           }).error(function (data) {
            typeof error === 'function' && error(data);
           });
           $scope.users = users;
          };

          $scope.improvConv = new ImprovConv(1);
          $scope.quickPlayWizardStep = "home";
          $scope.chats = [];
          $scope.users = [];
          $scope.selectedChat = [];
          $scope.acceptInvitationData = '';
          $scope.acceptInvitationDataError = '';

          $scope.selectAction = function (actionType) {
           switch (actionType) {
            case 1:
             $scope.quickPlayWizardStep = "start-type";
             break;
            case 2:
             $scope.quickPlayWizardStep = "chats-selection";
             console.log("chats", $scope.chats);
             break;
           }
          };

          $scope.selectChat = function (chatId) {
           $scope.quickPlayWizardStep = "start-type";
           function filterByID(obj) {
            if ('id' in obj && obj.id === chatId) {
             return true;
            } else {
             return false;
            }
           }

           $scope.selectedChat = $scope.chats.filter(filterByID)[0];
           console.log("Chat ", $scope.selectedChat);
          };

          $scope.selectPlay = function (playType) {
           switch (playType) {
            case 1:
             $scope.quickPlayWizardStep = "play";
             if ($scope.selectedChat.id) {
              $scope.improvConv.quickPlay(2, $scope.selectedChat.id);
              return;
             }
             $scope.improvConv.quickPlay(1);
             break;
            case 2:
             $scope.quickPlayWizardStep = "invite-play";
             $scope.improvConv.invitePlay(1);
             break;
            case 3:
             $scope.quickPlayWizardStep = "invite-play";
             $scope.improvConv.invitePlay(2);
             break;
            case 4:
             $scope.quickPlayWizardStep = "play";
             $scope.improvConv.quickPlay(2, 1);
             break;
           }
          };


          $scope.invitePlay = function (inviteType) {
           switch (inviteType) {
            case 1:
             $scope.improvConv.invitePlay(1);
             $scope.quickPlayWizardStep = "invite-wait";
             break;
           }
          };

          $scope.selectUser = function (index) {
           $scope.selectedUser = $scope.users[index];
          };

          $scope.quickPlay = function () {
           $scope.improvConv.quickPlay();
          };

          $scope.start = function () {
           $scope.quickPlayWizardStep = "actions";
          };

          $scope.selectChatsWizard = function () {
           $scope.quickPlayWizardStep = 1;
          };

          $scope.selectRandomPlay = function () {
           $scope.quickPlayWizardStep = 2;
           $scope.improvConv.quickPlay(0);
          };

          $("body").on("click", "#ic-samplestart-btn", function (e) {
           $scope.improvConv.quickPlay();
          });
          $scope.getChats();
          $scope.getUsers();
         }]);