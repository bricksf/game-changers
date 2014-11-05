// flightplan.js
var Flightplan = require('flightplan');

var tmpDir = 'giants-' + new Date().getTime();

var plan = new Flightplan();

// configuration
plan.briefing({
  debug: false,
  destinations: {
    'staging': {
      host: 'cameronhost.com',
      username: 'ubuntu',
      privateKey: "/Users/johnhanusek/.ec2/accounts/jcnh74/ec2-keypair"
    },
    'production': {
      host: 'cameronhost.com',
      username: 'ubuntu',
      privateKey: "/Users/johnhanusek/.ec2/accounts/jcnh74/ec2-keypair"
    }
  }
});

// run commands on localhost
plan.local(function(local) {
  local.log('Run build');
  local.exec('gulp build');

  local.log('Copy files to remote hosts');
  var filesToCopy = local.exec('git ls-files', {silent: true});
  local.transfer(filesToCopy, '/tmp/' + tmpDir);
});

// run commands on remote hosts (destinations)
plan.remote(function(remote) {
  remote.log('Move folder to version directory');
  remote.sudo('cp -R /tmp/' + tmpDir + ' /var/www/cameronhost.com/public_html/wp-content/theme_versions/giants/', {user: 'www-data'});
  remote.rm('-rf /tmp/' + tmpDir);

  remote.log('Symlink new version');
  remote.sudo('ln -snf /var/www/cameronhost.com/public_html/wp-content/theme_versions/giants/' + tmpDir + ' /var/www/cameronhost.com/public_html/wp-content/themes/giants', {user: 'www-data'});
});
