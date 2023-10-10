# Install Containerd

sudo sysctl net.bridge.bridge-nf-call-iptables=1

         sudo kubeadm init --pod-network-cidr=192.168.0.0/16
         kubeadm init --pod-network-cidr=192.168.0.0/16  --apiserver-advertise-address=192.168.253.129 --control-plane-endpoint=192.168.253.129
        sudo  kubeadm init --pod-network-cidr=10.244.0.0/16 --apiserver-advertise-address=192.168.253.129 --control-plane-endpoint=192.168.253.129

        systemctl daemon-reload && systemctl restart kubelet
        systemctl status kubelet
        sudo systemctl start kubelet

        if err
        ````
        sudo journalctl -xeu kubelet
        err="failed to load kubelet config file, path: /var/lib/kubelet/>
        ls -l /var/lib/kubelet/




        ````

        To initialize the control-plane node run:
      kubeadm init  --pod-network-cidr=<podip> --apiserver-advertise-address=<calico-ip> --control-plane-endpoint=<node-ip>
      kubeadm init --apiserver-advertise-address=172.16.16.100 --pod-network-cidr=192.168.0.0/16  --ignore-preflight-errors=all

      kubeadm token create --print-join-command
      deploy pod network
      kubectl --kubeconfig=/etc/kubernetes/admin.conf create -f https://docs.projectcalico.org/v3.14/manifests/calico.yaml

      If you want to be able to run kubectl commands as non-root user, then as a non-root user perform these

      mkdir -p $HOME/.kube
      sudo cp -i /etc/kubernetes/admin.conf $HOME/.kube/config
      sudo chown $(id -u):$(id -g) $HOME/.kube/config
