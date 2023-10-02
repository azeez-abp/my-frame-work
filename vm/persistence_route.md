To add a static route to a network configuration file, you'll need to edit the appropriate configuration file for your Linux distribution. Below are examples for both Debian-based (like Ubuntu) and Red Hat-based (like CentOS) systems.

### Debian-based Systems (Ubuntu)

1. Open the network configuration file for editing. This could be either `/etc/network/interfaces` or a file inside the `/etc/network/interfaces.d/` directory.

   ```bash
   sudo nano /etc/network/interfaces
   ```

2. Add a `post-up` command to add the static route. For example, if you want to add a route to network `192.168.1.0/24` via gateway `10.0.0.1`, you can add the following line:

   ```bash
   post-up ip route add 192.168.1.0/24 via 10.0.0.1
   ```

   It should look something like this:

   ```plaintext
   auto eth0
   iface eth0 inet static
       address 192.168.0.2
       netmask 255.255.255.0
       gateway 192.168.0.1
       post-up ip route add 192.168.1.0/24 via 10.0.0.1
   ```

3. Save the file and exit.

4. Restart networking:

   ```bash
   sudo systemctl restart networking
   ```

### Red Hat-based Systems (CentOS)

1. Open the network configuration file for editing. This is usually `/etc/sysconfig/network-scripts/ifcfg-[interface_name]`, where `[interface_name]` is the name of your network interface (like `eth0`, `ens33`, etc.).

   ```bash
   sudo nano /etc/sysconfig/network-scripts/ifcfg-[interface_name]
   ```

2. Add a `POST_UP_SCRIPT` option to execute a script after the interface is brought up. For example, if you want to add a route to network `192.168.1.0/24` via gateway `10.0.0.1`, you can add the following line:

   ```bash
   POST_UP_SCRIPT="/etc/sysconfig/network-scripts/route-add.sh"
   ```

   Create the script `/etc/sysconfig/network-scripts/route-add.sh` and make it executable:

   ```bash
   echo -e "#!/bin/bash\nip route add 192.168.1.0/24 via 10.0.0.1" | sudo tee /etc/sysconfig/network-scripts/route-add.sh
   sudo chmod +x /etc/sysconfig/network-scripts/route-add.sh
   ```

3. Save the file and exit.

4. Restart networking:

   ```bash
   sudo systemctl restart NetworkManager
   ```

Remember to replace `[interface_name]` with the actual interface name and adjust the route details (`192.168.1.0/24` and `10.0.0.1`) to your specific setup.
