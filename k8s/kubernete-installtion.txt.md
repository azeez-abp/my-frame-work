## Which Container runtime do you want

### FOR containerd

- you will have to install continerd runc and CNI plugins (https://kubernetes.io/docs/setup/production-environment/container-runtimes/)

1. wget https://github.com/containerd/containerd/releases/download/v1.6.8/containerd-1.6.8-linux-amd64.tar.gz
   check the latestr version
2. sudo tar Cxzvf /usr/local containerd-1.6.8-linux-amd64.tar.gz
3. Next, we need the runc command line tool which is used to deploy containers with Containerd. Download this package with:
   check runc dpkg -l | grep runc =========== rpm -q runc
   wget https://github.com/opencontainers/runc/releases/download/v1.1.3/runc.amd64
   Install runc with:
   sudo install -m 755 runc.amd64 /usr/local/sbin/runc
4. Now, we need the Container Network Interface which is used to provide the necessary networking functionality. Download CNI with:  
   wget https://github.com/containernetworking/plugins/releases/download/v1.1.1/cni-plugins-linux-amd64-v1.1.1.tgz
   Create a new directory with: sudo mkdir -p /opt/cni/bin
   Unpack the CNI file into our new directory with:
   sudo tar Cxzvf /opt/cni/bin cni-plugins-linux-amd64-v1.1.1.tgz
5. How to configure Containerd'
   Create a new directory to house the Containerd configurations with:
   sudo mkdir /etc/containerd
   Create the configurations with:
   containerd config default | sudo tee /etc/containerd/config.toml
   Know your Control group cgroup
   ps -p 1 (systemd or cgroupfs) configure figure to be the same on all node

To set systemd as the cgroup driver, edit the KubeletConfiguration option of cgroupDriver and set it to systemd. For example:

sudo tee /etc/containerd/config.toml <<EOF
[plugins."io.containerd.grpc.v1.cri".containerd.runtimes.runc]
[plugins."io.containerd.grpc.v1.cri".containerd.runtimes.runc.options]
SystemdCgroup = true
EOF
sudo nano /etc/containerd/config.toml
Reload the systemd daemon with:
sudo systemctl daemon-reload
nano /etc/systemd/system/containerd.service

ADD

```
[Unit]
Description=Containerd container runtime
Documentation=https://containerd.io
After=network.target

[Service]
ExecStartPre=/sbin/modprobe overlay
ExecStart=/usr/local/bin/containerd

[Install]
WantedBy=multi-user.target


```

sudo systemctl enable --now containerd

systemctl status containerd
Finally, start and enable the Containerd service with:
sudo systemctl enable --now containerd

### FOR CRI-O (https://github.com/cri-o/cri-o/blob/main/install.md#readme)

RUN thsese as root a user
echo 'deb http://deb.debian.org/debian buster-backports main' > /etc/apt/sources.list.d/backports.list
apt update
apt install -y -t buster-backports libseccomp2 || apt update -y -t buster-backports libseccomp2

echo "deb [signed-by=/usr/share/keyrings/libcontainers-archive-keyring.gpg] https://download.opensuse.org/repositories/devel:/kubic:/libcontainers:/stable/$OS/ /" > /etc/apt/sources.list.d/devel:kubic:libcontainers:stable.list
echo "deb [signed-by=/usr/share/keyrings/libcontainers-crio-archive-keyring.gpg] https://download.opensuse.org/repositories/devel:/kubic:/libcontainers:/stable:/cri-o:/$VERSION/$OS/ /" > /etc/apt/sources.list.d/devel:kubic:libcontainers:stable:cri-o:$VERSION.list

mkdir -p /usr/share/keyrings
curl -L https://download.opensuse.org/repositories/devel:/kubic:/libcontainers:/stable/$OS/Release.key | gpg --dearmor -o /usr/share/keyrings/libcontainers-archive-keyring.gpg
curl -L https://download.opensuse.org/repositories/devel:/kubic:/libcontainers:/stable:/cri-o:/$VERSION/$OS/Release.key | gpg --dearmor -o /usr/share/keyrings/libcontainers-crio-archive-keyring.gpg

apt-get update
apt-get install cri-o cri-o-runc

The conatainer need to talk to each other, then you need to Setup CNI networking

1. If you are installing for the first time, generate and install configuration files with:

sudo make install.config 2. Edit /etc/containers/registries.conf and verify that the registries option has valid values in it. For example:

```
[registries.search]
registries = ['registry.access.redhat.com', 'registry.fedoraproject.org', 'quay.io', 'docker.io']

[registries.insecure]
registries = []

[registries.block]
registries = []

```

Cgroup driver CRI-O uses the systemd cgroup driver by default
To switch to the cgroupfs cgroup driver, either edit /etc/crio/crio.conf or place a drop-in configuration in /etc/crio/crio.conf.d/02-cgroup-manager.conf, for example:

```
[crio.runtime]
conmon_cgroup = "pod"
cgroup_manager = "cgroupfs"
```

For CRI-O, the CRI socket is /var/run/crio/crio.sock by default

Overriding the sandbox (pause) image
In your CRI-O config you can set the following config (/etc/crio/crio.conf)value:

[crio.image]
pause_image="registry.k8s.io/pause:3.7"

# install kubeadm kublet and kubectl

        sudo apt-get update
        sudo apt-get install -y apt-transport-https ca-certificates curl

      curl -fsSL https://pkgs.k8s.io/core:/stable:/v1.28/deb/Release.key | sudo gpg --dearmor -o /etc/apt/keyrings/kubernetes-apt-keyring.gpg

        echo 'deb [signed-by=/etc/apt/keyrings/kubernetes-apt-keyring.gpg] https://pkgs.k8s.io/core:/stable:/v1.28/deb/ /' | sudo tee /etc/apt/sources.list.d/kubernetes.list

        sudo apt-get update

        sudo apt-get install -y kubelet kubeadm kubectl
        sudo apt-mark hold kubelet kubeadm kubectl

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
